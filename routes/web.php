<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OrderReportController;
use App\Http\Controllers\ExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    return to_route('filament.admin.auth.login');
})->name('login');

Route::get('/supply-in/{id}/barcodes/pdf', [\App\Http\Controllers\SupplyInBarcodeController::class, 'exportPdf'])
    ->name('supply-in.barcodes.pdf');

Route::get('/export', [\App\Http\Controllers\ExportController::class, 'export'])->name('export.data');



// Route::get('/report/export', [\App\Http\Controllers\ReportController::class, 'export'])->name('report.export');


// Route::get('/report/orders/export/{scope?}', [OrderReportController::class, 'export'])
//     ->name('orders.report.export');