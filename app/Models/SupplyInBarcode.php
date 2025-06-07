<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyInBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['supply_in_id', 'product_id', 'code'];

    public function supplyIn()
    {
        return $this->belongsTo(SupplyIn::class);
    }
    public function damaged()
    {
        return $this->hasOne(\App\Models\DamagedProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
