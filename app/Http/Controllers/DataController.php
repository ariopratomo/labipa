<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function barang()
    {
        $barang = Barang::orderBy('nm_brg', 'ASC')->get();
        // $barang->load('author');
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
    // public function pinjam()
    // {
    //     $pinjam = PinjamBarang::get();
    //     $pinjam->load('user', 'barang');
    //     // $pinjam = PinjamBarang::leftjoin('barang', 'pinjam_barang.brg_id', '=', 'barang.id')
    //     //     ->leftjoin('users', 'pinjam_barang.user_id', '=', 'users.id')->select('barang.nm_brg', 'jml_pinjam', 'users.name');
    //     return datatables()->of($pinjam)

    //         // ->addColumn('nm_brg', function (PinjamBarang $model) {
    //         //     return $model->barang->nm_brg;
    //         // })
    //         // ->addColumn('peminjam', function (PinjamBarang $model) {
    //         //     return $model->user->name;
    //         // })
    //         ->editColumn('tgl_pinjam', function (PinjamBarang $model) {
    //             return $model->tgl_pinjam ? with(new Carbon($model->tgl_pinjam))->format('d/m/Y') : '';
    //         })
    //         ->editColumn('tgl_kembali', function (PinjamBarang $model) {
    //             $tgl_kembali =  $model->tgl_kembali;

    //             if (is_null($tgl_kembali))
    //                 return '-';
    //             else return  $tgl_kembali ? with(new Carbon($tgl_kembali))->format('d/m/Y') : '';
    //         })
    //         ->addColumn('action', 'barang.pinjam.action')
    //         ->addIndexColumn()
    //         ->rawColumns(['action', 'tgl_kembali'])
    //         ->toJson();
    // }
}
