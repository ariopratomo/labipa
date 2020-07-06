<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kelas;
use App\PemakaianBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function barang()
    {
        $barang = Barang::orderBy('nm_brg', 'ASC')->get();
        return datatables()->of($barang)
            ->addColumn('nm_brg', function (Barang $model) {
                return $model->nm_brg;
            })
            ->editColumn('jml_brg', function (Barang $model) {
                return $model->jml_brg;
            })
            ->addColumn('action', 'barang.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
    public function pakai()
    {
        $pakai = PemakaianBarang::get();
        $pakai->load('user', 'barang');
        return datatables()->of($pakai)
            ->editColumn('tgl_pakai', function (PemakaianBarang $model) {
                return $model->tgl_pakai ? with(new Carbon($model->tgl_pakai))->format('d/m/Y') : '';
            })
            ->editColumn('tgl_kembali', function (PemakaianBarang $model) {
                $tgl_kembali =  $model->tgl_kembali;

                if (is_null($tgl_kembali))
                    return '-';
                else return  $tgl_kembali ? with(new Carbon($tgl_kembali))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'barang.pakai.action')
            ->addIndexColumn()
            ->rawColumns(['action', 'tgl_kembali'])
            ->toJson();
    }
    public function kelas()
    {
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        return datatables()->of($kelas)
            ->addColumn('action', 'kelas.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
