<?php

namespace App\Http\Controllers;

use App\Models\SupplyIn;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

class SupplyInBarcodeController extends Controller
{
    public function exportPdf($id)
    {
        $supplyIn = SupplyIn::with('barcodes')->findOrFail($id);
        $pdf = Pdf::loadView('barcodes.pdf', compact('supplyIn'))->setPaper('a4');
        return $pdf->stream('barcodes.pdf');
    }
}
