<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::with(['category', 'supplier'])
            ->get()
            ->map(function ($product) {
                return [
                    'name'     => $product->name,
                    'price'    => $product->price,
                    'quantity' => $product->quantity,
                    'category' => $product->category?->name ?? '-', // NULL-safe
                    'supplier' => $product->supplier?->name ?? '-', // NULL-safe
                ];
            });
    }

    public function headings(): array
    {
        return ['Name', 'Price', 'Quantity', 'Kategori', 'Supplier'];
    }
}
