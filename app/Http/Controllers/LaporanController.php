<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PemakaianBarang;
use App\PemusnahanBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return view('laporan.index', ['bulan' => $bulan]);
    }

    public function cetakBarang()
    {
        $barang = Barang::all();
        $tahun = date("Y");
        Date::setLocale('id'); //id kode untuk indonesia
        $tgl = Date::now()->format('j F Y');
        $tglCetak = Date::now()->format('j-m-Y_H:i:s');
        $pdf = PDF::loadview('laporan.views.barang', ['barang' => $barang, 'tahun' => $tahun, 'tgl' => $tgl, 'tglCetak' => $tglCetak])->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_barang_' . date('d_m_Y') . '.pdf');
    }

    public function cetakPakai(Request $request)
    {
        if ($request->periode) {

            $title = 'Laporan Pemakaian Barang Perperiode';

            $from = $request->dari;
            $to = $request->sampai;

            $filter = $from . ' sampai ' . $to;
            $tglCetak = Date::now()->format('j-m-Y_H:i:s');
            $barang =  PemakaianBarang::whereBetween('tgl_pakai', [$from, $to])->orderBy('tgl_pakai', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = $this->_datePakai($barang, $tahun, $tgl, $title, $filter, $tglCetak);

            return $pdf->stream();
        } else if ($request->perbulan) {

            $title = 'Laporan Pemakaian Barang Perbulan';

            $month = $request->bulan;
            $year = $request->tahun;
            $bulan = $this->_bulan($month);

            $filter = $bulan . ' ' . $year;
            $tglCetak = Date::now()->format('j-m-Y_H:i:s');
            $barang =  PemakaianBarang::whereMonth('tgl_pakai', '=', $month)
                ->whereYear('tgl_pakai', '=', $year)
                ->orderBy('tgl_pakai', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = $this->_datePakai($barang, $tahun, $tgl, $title, $filter, $tglCetak);


            return $pdf->stream();
        } else if ($request->pertahun) {

            $title = 'Laporan Pemakaian Barang Pertahun';

            $month = $request->bulan;
            $year = $request->tahun;

            $filter = 'Tahun ' . $year;
            $tglCetak = Date::now()->format('j-m-Y_H:i:s');
            $barang =  PemakaianBarang::whereYear('tgl_pakai', '=', $year)
                ->orderBy('tgl_pakai', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = $this->_datePakai($barang, $tahun, $tgl, $title, $filter, $tglCetak);


            return $pdf->stream();
        } else {
            abort(404);
        }
    }

    public function cetakMusnah(Request $request)
    {
        if ($request->periode) {

            $title = 'Laporan Pemusnahan Barang Perperiode';

            $from = $request->dari2;
            $to = $request->sampai2;

            $filter = $from . ' sampai ' . $to;
            $tglCetak = Date::now()->format('j-m-Y_H:i:s');
            $barang =  PemusnahanBarang::whereBetween('tgl_musnah', [$from, $to])->orderBy('tgl_musnah', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = $this->_dateMusnah($barang, $tahun, $tgl, $title, $filter, $tglCetak);

            return $pdf->stream();
        } else if ($request->perbulan) {

            $title = 'Laporan Pemusnahan Barang Perbulan';

            $month = $request->bulan2;
            $year = $request->tahun2;
            $bulan = $this->_bulan($month);

            $filter = $bulan . ' ' . $year;
            $tglCetak = Date::now()->format('j-m-Y_H:i:s');
            $barang =  PemusnahanBarang::whereMonth('tgl_musnah', '=', $month)
                ->whereYear('tgl_musnah', '=', $year)
                ->orderBy('tgl_musnah', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = $this->_dateMusnah($barang, $tahun, $tgl, $title, $filter, $tglCetak);


            return $pdf->stream();
        } else if ($request->pertahun) {

            $title = 'Laporan Pemusnahan Barang Pertahun';

            $month = $request->bulan;
            $year = $request->tahun;

            $filter = 'Tahun ' . $year;
            $tglCetak = Date::now()->format('j-m-Y_H:i:s');
            $barang =  PemusnahanBarang::whereYear('tgl_musnah', '=', $year)
                ->orderBy('tgl_musnah', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = $this->_dateMusnah($barang, $tahun, $tgl, $title, $filter, $tglCetak);


            return $pdf->stream();
        } else {
            abort(404);
        }
    }

    private function _datePakai($barang, $tahun, $tgl, $title, $filter, $tglCetak)
    {
        $pdf = PDF::loadview('laporan.views.pakai', [
            'barang' => $barang,
            'tahun' => $tahun,
            'tgl' => $tgl,
            'title' => $title,
            'filter' => $filter,
            'tglCetak' => $tglCetak
        ])->setPaper('a4', 'potrait');
        return $pdf;
    }

    private function _bulan($month)
    {
        switch ($month) {
            case "01":
                return 'Januari';
                break;
            case "02":
                return 'Februari';
                break;
            case "03":
                return 'Maret';
                break;
            case "04":
                return 'April';
                break;
            case "05":
                return 'Mei';
                break;
            case "06":
                return 'Juni';
                break;
            case "07":
                return 'Juli';
                break;
            case "08":
                return 'Agustus';
                break;
            case "09":
                return 'September';
                break;
            case "10":
                return 'Oktober';
                break;
            case "11":
                return 'November';
                break;
            case "12":
                return 'Desember';
                break;
        }
    }
    private function _dateMusnah($barang, $tahun, $tgl, $title, $filter, $tglCetak)
    {
        $pdf = PDF::loadview('laporan.views.musnah', [
            'barang' => $barang,
            'tahun' => $tahun,
            'tgl' => $tgl,
            'title' => $title,
            'filter' => $filter,
            'tglCetak' => $tglCetak
        ])->setPaper('a4', 'potrait');
        return $pdf;
    }



    public function datepakai()
    {
        $first = PemakaianBarang::orderBy('tgl_pakai', 'asc')->first();
        $last = PemakaianBarang::orderBy('tgl_pakai', 'desc')->first();
        return response()->json([
            'first' => $first->tgl_pakai,
            'last' => $last->tgl_pakai,
        ]);
    }

    public function datemusnah()
    {
        $first = PemusnahanBarang::orderBy('tgl_musnah', 'asc')->first();
        $last = PemusnahanBarang::orderBy('tgl_musnah', 'desc')->first();
        return response()->json([
            'first' => $first->tgl_musnah,
            'last' => $last->tgl_musnah,
        ]);
    }
}
