<?php

namespace App\Filament\Resources\ProductSupplierResource\Pages;

use App\Filament\Resources\ProductSupplierResource;
use App\Models\ProductCategory;
use App\Models\ProductSupplier;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProductSuppliers extends ListRecords
{
    protected static string $resource = ProductSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        // Ambil hanya 4-5 kategori dengan supplier terbanyak
        $topCategories = ProductCategory::withCount('productSuppliers')
            ->having('product_suppliers_count', '>', 0)
            ->orderBy('product_suppliers_count', 'desc')
            ->limit(4) // Batasi hanya 4 kategori teratas
            ->get();

        $tabs = [];

        // Tab "All suppliers"
        $tabs['all'] = Tab::make('All suppliers')
            ->badge(ProductSupplier::count())
            ->icon('heroicon-o-users');

        // Tambahkan tabs untuk kategori teratas
        foreach ($topCategories as $category) {
            $supplierCount = ProductSupplier::where('category_id', $category->id)->count();

            if ($supplierCount > 0) {
                $tabs[str($category->title)->slug()->toString()] = Tab::make($category->title)
                    ->modifyQueryUsing(fn(Builder $query) => $query->where('category_id', $category->id))
                    ->badge($supplierCount);
            }
        }

        // Hitung kategori lainnya
        $topCategoryIds = $topCategories->pluck('id');
        $otherSuppliersCount = ProductSupplier::whereNotIn('category_id', $topCategoryIds)->count();

        // Tambahkan tab "Others" jika ada kategori lain
        if ($otherSuppliersCount > 0) {
            $tabs['others'] = Tab::make('Lainnya')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereNotIn('category_id', $topCategoryIds))
                ->badge($otherSuppliersCount)
                ->icon('heroicon-o-ellipsis-horizontal');
        }

        return $tabs;
    }
}
