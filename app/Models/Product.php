<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'quantity',
        'product_categories_id',
        'product_suppliers_id',
        'create_at',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(\App\Models\ProductSupplier::class, 'product_suppliers_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(\App\Models\ProductCategory::class, 'product_categories_id');
    }
    public function supplyIns()
    {
        return $this->hasMany(SupplyIn::class);
    }
    public function barcodes()
    {
        return $this->hasMany(\App\Models\SupplyInBarcode::class);
    }

    public function productSupplier()
    {
        return $this->belongsTo(ProductSupplier::class, 'product_suppliers_id');
    }

}
