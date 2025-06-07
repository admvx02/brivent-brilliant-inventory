<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        $orders = Order::select(
            'user_id',
            'client_name',
            'client_phone',
            'client_address',
            'total',
            'net',
            'created_at'
        )->get();

        // Hitung total keseluruhan
        $totalSum = $orders->sum('total');
        $netSum = $orders->sum('net');

        // Ubah koleksi jadi array 2D
        $rows = $orders->map(function ($order) {
            return [
                $order->user_id,
                $order->client_name,
                $order->client_phone,
                $order->client_address,
                $order->total,
                $order->net,
                $order->created_at,
            ];
        });

        // Tambahkan baris kosong dan baris total
        $rows->push(['', '', '', 'Total Keseluruhan', $totalSum, $netSum, '']);
        $rows->push(['', '', '', '', 'Laba', $totalSum-$netSum]);

        return $rows;
    }

    public function headings(): array
    {
        return ['ID', 'Client Name', 'Phone', 'Address', 'Total', 'Net', 'Created At'];
    }
}
