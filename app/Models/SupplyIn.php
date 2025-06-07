<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SupplyInBarcode;

class SupplyIn extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'quantity', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::created(fn($supplyIn) => $supplyIn->updateProductAverage());
        static::updated(fn($supplyIn) => $supplyIn->updateProductAverage());
        static::deleted(fn($supplyIn) => $supplyIn->updateProductAverage());
    }

    

    public function updateProductAverage()
    {
        $product = $this->product;

        // Semua entri SupplyIn untuk produk ini
        $supplyInList = $product->supplyIns()->get();

        // Total qty & harga
        $totalQty = $supplyInList->sum('quantity');
        $totalHarga = $supplyInList->sum(fn($s) => $s->quantity * $s->price);
        $averagePrice = $totalQty > 0 ? $totalHarga / $totalQty : 0;

        // Hitung total barcode rusak
        $damagedCount = \App\Models\SupplyInBarcode::where('product_id', $product->id)
            ->whereHas('damaged')
            ->count();

        // Stok = semua barang masuk - rusak
        $stock = $totalQty - $damagedCount;

        $product->update([
            'price' => $averagePrice,
            'quantity' => $stock, // gunakan hasil akhir di sini
        ]);
    }
    public function barcodes()
    {
        return $this->hasMany(\App\Models\SupplyInBarcode::class);
    }
    
}
