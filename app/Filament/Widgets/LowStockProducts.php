<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockProducts extends BaseWidget
{
    protected static ?string $heading = 'Produk Hampir Habis';

    protected int|string|array $columnSpan = 'half'; // agar memenuhi lebar dashboard

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()
                    ->where('quantity', '<=', 10)
                    ->orderBy('quantity', 'asc')
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('Stok')
                    ->color(fn ($state) => $state <= 2 ? 'danger' : 'warning')
                    ->sortable(),
            ]);
    }
}
