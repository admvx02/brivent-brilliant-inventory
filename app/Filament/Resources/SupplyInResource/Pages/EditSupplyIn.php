<?php

namespace App\Filament\Resources\SupplyInResource\Pages;

use App\Filament\Resources\SupplyInResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplyIn extends EditRecord
{
    protected static string $resource = SupplyInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function afterSave(): void
    {
        $record = $this->record->fresh(); // pastikan data terbaru
        $currentCount = $record->barcodes()->count();
        $expectedCount = $record->quantity;

        if ($expectedCount > $currentCount) {
            // Tambah barcode
            $start = $currentCount + 1;
            for ($i = $start; $i <= $expectedCount; $i++) {
                $code = now()->format('Ymd') . '-' . str_pad($record->id . $i, 5, '0', STR_PAD_LEFT);
                \App\Models\SupplyInBarcode::create([
                    'supply_in_id' => $record->id,
                    'product_id' => $record->product_id,
                    'code' => $code,
                ]);
            }
        } elseif ($expectedCount < $currentCount) {
            // Kurangi barcode dari yang terakhir
            $toDelete = $record->barcodes()
                ->orderByDesc('id')
                ->take($currentCount - $expectedCount)
                ->get();

            foreach ($toDelete as $barcode) {
                // Optional: hindari hapus jika barcode sudah rusak
                if (!$barcode->damaged) {
                    $barcode->delete();
                }
            }
        }
    }

}
