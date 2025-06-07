<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductPieChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah per Produk';
    protected static string $chartType = 'pie';

    protected function getData(): array
    {
        $products = \App\Models\Product::select('name', 'quantity')
            ->where('quantity', '>', 0)
            ->get();

        return [
            'datasets' => [
                [
                    'data' => $products->pluck('quantity'),
                    'backgroundColor' => $this->generateColors($products->count()), // Warna dinamis
                ],
            ],
            'labels' => $products->pluck('name'),
        ];
    }


    protected function getType(): string
    {
        return 'pie';
    }
    private function generateColors($count): array
    {
        $colors = [
            '#f87171', '#60a5fa', '#34d399', '#fbbf24',
            '#a78bfa', '#f472b6', '#fcd34d', '#10b981',
            '#3b82f6', '#eab308', '#f97316', '#22d3ee'
        ];

        // Ulangi warna jika produk > warna
        while (count($colors) < $count) {
            $colors = array_merge($colors, $colors);
        }

        return array_slice($colors, 0, $count);
    }
}

