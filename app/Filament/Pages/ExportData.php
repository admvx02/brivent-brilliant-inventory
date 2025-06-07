<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Exports\DamagedProductsExport;
use App\Exports\SupplyInsExport;
use App\Exports\OrdersExport;
use Filament\Forms;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Livewire\Redirector;

class ExportData extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static string $view = 'filament.pages.export-data';
     protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Export Data';
    protected static ?string $navigationGroup = 'Brivent Management';

    public function export(string $type)
    {
        return match ($type) {
            'products' => Excel::download(new ProductsExport, 'products.xlsx'),
            'damaged-products' => Excel::download(new DamagedProductsExport, 'damaged_products.xlsx'),
            'supply-ins' => Excel::download(new SupplyInsExport, 'supply_ins.xlsx'),
            'orders' => Excel::download(new OrdersExport, 'orders.xlsx'),
            default => back(),
        };
    }
}
