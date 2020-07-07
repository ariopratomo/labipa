<?php

namespace App\Http\Controllers;

use App\Barang;
use PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Cetak laporan barang
    public function cetak_barang()
    {
        $barang = Barang::all();

        $pdf = PDF::loadview('report.report-barang', ['barang' => $barang])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
