<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Models\User;
use App\Models\Product;
use App\Models\DamagedProduct;
use App\Mail\LowStockAlert;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title("Order created")
            ->body("The Order has been created successfully.")
            ->icon('heroicon-o-document-text')
            ->color('success');
    }

    protected function beforeCreate(): void
    {
        foreach ($this->data['orderProducts'] as $order) {
            $product = Product::find($order['product_id']);

            if (!$product) {
                Notification::make()
                    ->error()
                    ->title("Product not found")
                    ->body('The product with ID ' . $order['product_id'] . ' does not exist.')
                    ->persistent()
                    ->send();

                $this->halt();
            }

            if ($product->quantity < $order['quantity']) {
                Notification::make()
                    ->warning()
                    ->title("Insufficient stock")
                    ->body('The quantity needed for the product ' . $product->name . ' is not available. Available quantity is: ' . $product->quantity)
                    ->persistent()
                    ->send();

                $this->halt();
            }
        }

        foreach ($this->data['orderProducts'] as $order) {
            $product = Product::find($order['product_id']);

            if ($product) {
                $product->decrement('quantity', $order['quantity']);
            }
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function afterCreate(): void
    {
        $lowStockProducts = Product::where('quantity', '<=', 10)->get(['name', 'quantity']);

        // Ambil relasi orderProducts dari Order yang baru dibuat
        $order = $this->record;
        foreach ($order->orderProducts as $orderProduct) {
            $product = $orderProduct->product;
            if (!$product) continue;

            // Ambil barcode-barcode yang belum rusak
            $barcodes = $product->barcodes()->whereDoesntHave('damaged')->take($orderProduct->quantity)->get();

            // Cek jika stok barcode rusak tidak cukup
            if ($barcodes->count() < $orderProduct->quantity) {
                throw new \Exception("Stok barcode tidak cukup untuk mencatat produk rusak.");
            }

            foreach ($barcodes as $barcode) {
                DamagedProduct::create([
                    'supply_in_barcode_id' => $barcode->id,
                    'damaged_at' => now(),
                    'reason' => 'Otomatis karena pesanan',
                    'notes' => 'Dicatat rusak dari order #' . $order->id,
                ]);
            }
        }

        if ($lowStockProducts->isNotEmpty()) {
            $adminUser = User::find(1, ['name', 'email']);

            $emailData = [
                // 'subject' => 'Low Stocks Alert',
                'products' => $lowStockProducts,
                'user' => $adminUser,
            ];

            Mail::send(new LowStockAlert($emailData));
        }
    }
}
