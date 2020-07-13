<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PemakaianBarang;
use App\PemusnahanBarang;
use PDF;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class ReportController extends Controller
{
    // Cetak laporan barang
    public function cetakBarang()
    {
        $barang = Barang::all();
        $tahun = date("Y");
        Date::setLocale('id'); //id kode untuk indonesia
        $tgl = Date::now()->format('j F Y');
        $pdf = PDF::loadview('report.report-barang', ['barang' => $barang, 'tahun' => $tahun, 'tgl' => $tgl])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    public function cetakPemakaianBarang()
    {
        $barang = PemakaianBarang::all();
        $tahun = date("Y");
        Date::setLocale('id'); //id kode untuk indonesia
        $tgl = Date::now()->format('j F Y');
        $pdf = PDF::loadview('report.report-pakaibarang', ['barang' => $barang, 'tahun' => $tahun, 'tgl' => $tgl])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    public function cetakPemusnahanBarang()
    {
        $barang = PemusnahanBarang::all();
        $tahun = date("Y");
        Date::setLocale('id'); //id kode untuk indonesia
        $tgl = Date::now()->format('j F Y');
        $pdf = PDF::loadview('report.report-musnahbarang', ['barang' => $barang, 'tahun' => $tahun, 'tgl' => $tgl])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
