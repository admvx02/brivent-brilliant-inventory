<?php

namespace App\Http\Controllers;

use App\Exports\OrderProfitExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderReportController extends Controller
{
    public function export(string $scope = 'all')
    {
        $filename = 'laporan-penjualan-' . $scope . '-' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new OrderProfitExport($scope), $filename);
    }
}