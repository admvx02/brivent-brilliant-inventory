<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\DamagedProduct;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use App\Models\ProductSupplier;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverview extends BaseWidget
{
    protected function getStats(): array
    {
        //current year
        $year = Carbon::now()->year;
        //variable to store each order count as array.
        $new_orders_count = [];
        // Ambil jumlah total dari semua order
        $total = Order::sum('total');
        // Ambil jumlah net dari semua order
        $net = Order::sum('net');

        $filteredDamagedCount = DamagedProduct::where('reason', '!=', 'Otomatis karena pesanan')->count();

        $lowestStock = Product::where('quantity', '<=', 10)->count();
        //Looping through the month array to get count for each month in the provided year
        for ($i = 1; $i <= 12; $i++) {
            $new_orders_count[] = Order::whereYear('updated_at', $year)
                ->whereMonth('updated_at', $i)
                ->count();
        }

        return [
            Stat::make(Str::plural('User', User::all()->count()), User::all()->count())
                ->description('Total of users')
                ->icon('heroicon-m-users')
                ->color('primary'),
            Stat::make(Str::plural('Product Category', ProductCategory::all()->count()), ProductCategory::all()->count())
                ->description('Total of categories')
                ->icon('heroicon-m-bookmark')
                ->color('primary'),
            Stat::make(Str::plural('Product Supplier', ProductSupplier::all()->count()), ProductSupplier::all()->count())
                ->description('Total of suppliers')
                ->icon('heroicon-m-document-plus')
                ->color('primary'),
            Stat::make(Str::plural('Product', Product::all()->count()), Product::all()->count())
                ->description('Total of products')
                ->icon('heroicon-m-queue-list')
                ->color('primary'),
            Stat::make(Str::plural('Order', Order::all()->count()), Order::all()->count())
                ->description('Total of orders')
                ->icon('heroicon-m-document-check')
                ->color('primary')
                ->chart($new_orders_count)
                ->chartColor('success'),
            Stat::make('Lowest Stock', $lowestStock)
                ->description('Total of products with low stock')
                ->icon('heroicon-m-exclamation-triangle')
                ->color('danger')
                ->chartColor('danger'),
            Stat::make(Str::plural('Damaged Product', $filteredDamagedCount),$filteredDamagedCount)
                ->description('Total of products with defect')
                ->icon('solar-folder-error-bold')
                ->color('danger')
                ->chartColor('danger'),
            Stat::make(Str::plural('Earning', $total), $total)
                ->description('Total of earnings')
                ->icon('heroicon-s-currency-dollar')
                ->color('primary'),
            Stat::make(Str::plural('Capital', $net), $net)
                ->description('Total of fund')
                ->icon('iconpark-funds-o')
                ->color('primary'),
        ];
    }
}
