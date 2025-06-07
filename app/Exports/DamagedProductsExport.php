<?php

namespace App\Exports;

use App\Models\DamagedProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DamagedProductsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return DamagedProduct::with('barcode')
            ->where('reason', '!=', 'Otomatis karena pesanan')
            ->get()
            ->map(function ($item) {
                return [
                    'Barcode' => $item->barcode->code ?? '-',
                    'Tanggal Rusak' => $item->damaged_at,
                    'Penyebab' => $item->reason,
                    'Catatan' => $item->notes,
                ];
            });
    }

    public function headings(): array
    {
        return ['Barcode ID', 'Tanggal Rusak', 'Penyebab', 'Catatan'];
    }
}