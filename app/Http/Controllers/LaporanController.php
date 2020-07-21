<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PemakaianBarang;
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
    public function cetakPakai(Request $request)
    {
        if ($request->periode) {

            $title = 'Laporan Barang Perperiode';

            $from = $request->dari;
            $to = $request->sampai;

            $barang =  PemakaianBarang::whereBetween('tgl_pakai', [$from, $to])->orderBy('tgl_pakai', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = PDF::loadview('laporan.views.pakai', [
                'barang' => $barang,
                'tahun' => $tahun,
                'tgl' => $tgl,
                'title' => $title
            ])->setPaper('a4', 'potrait');

            return $pdf->stream();
        } else if ($request->perblan) {

            $title = 'Laporan Barang Perbulan';

            $month = $request->bulan;
            $year = $request->tahun;

            $barang =  PemakaianBarang::whereMonth('tgl_pakai', '=', $month)
                ->whereYear('tgl_pakai', '=', $year)
                ->orderBy('tgl_pakai', 'asc')->get();
            $tahun = date("Y");
            Date::setLocale('id'); //id kode untuk indonesia

            $tgl = Date::now()->format('j F Y');

            $pdf = PDF::loadview('laporan.views.pakai', [
                'barang' => $barang,
                'tahun' => $tahun,
                'tgl' => $tgl,
                'title' => $title
            ])->setPaper('a4', 'potrait');

            return $pdf->stream();
        } else {
            abort(404);
        }
        // $from = Carbon::parse($request->dari)->format('Y-m-d') . ' 00:00:01';
        // $to = Carbon::parse($request->sampai)->format('Y-m-d') . ' 23:59:59';

        // dump($barang);
    }

    public function date()
    {
        $first = PemakaianBarang::orderBy('tgl_pakai', 'asc')->first();
        $last = PemakaianBarang::orderBy('tgl_pakai', 'desc')->first();
        return response()->json([
            'first' => $first->tgl_pakai,
            'last' => $last->tgl_pakai,
        ]);
    }
}
