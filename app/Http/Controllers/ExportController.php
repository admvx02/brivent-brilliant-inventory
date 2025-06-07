<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\{ProductsExport, DamagedProductsExport, SupplyInsExport, OrdersExport};

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $type = $request->input('type');
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        return match ($type) {
            'products' => Excel::download(new ProductsExport($start, $end), 'products.xlsx'),
            'damaged-products' => Excel::download(new DamagedProductsExport($start, $end), 'damaged_products.xlsx'),
            'supply-ins' => Excel::download(new SupplyInsExport($start, $end), 'supply_ins.xlsx'),
            'orders' => Excel::download(new OrdersExport($start, $end), 'orders.xlsx'),
            default => abort(404),
        };
    }
}
