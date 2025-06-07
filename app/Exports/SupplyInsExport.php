<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\SupplyIn;

class SupplyInsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return SupplyIn::with('product')
            ->get()
            ->map(function ($supplyIn) {
                return [
                    'product_name' => $supplyIn->product?->name ?? '-', // Jika relasi null
                    'quantity'     => $supplyIn->quantity,
                    'price'        => $supplyIn->price,
                ];
            });
    }

    public function headings(): array
    {
        return ['Product ID', 'Quantity', 'Price'];
    }
}

