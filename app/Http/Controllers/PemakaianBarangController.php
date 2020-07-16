<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PemakaianBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemakaianBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('barang.pakai.index', [
            'title' => 'Pakai Barang',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.pakai.create', [
            'barang' => Barang::orderBy('nm_brg', 'ASC')->get(),
            'title' => 'Tambah data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PemakaianBarang $pemakaianBarang)
    {
        $this->validate($request, [
            'nm_brg' => 'required',
            'jml_pakai' => 'required|numeric',
            'ket_pakai' => 'required',
            'tgl_pakai' => 'required',
        ]);

        $pemakaianBarang->create([
            'brg_id' => $request->nm_brg,
            'jml_pakai' => $request->jml_pakai,
            'ket_pakai' => $request->ket_pakai,
            'tgl_pakai' => $request->tgl_pakai,
            'status' => 'dipakai',
            'user_id' => Auth::user()->id,
        ]);
        // Barang::decrement('jml_brg', $request->jml_pakai);
        return redirect()->route('pemakaian-barang.index')->withInfo('Berhasil menambah data pemakaian barang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PemakaianBarang  $pemakaianBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PemakaianBarang $pemakaianBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PemakaianBarang  $pemakaianBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(PemakaianBarang $pemakaianBarang)
    {


        return view('barang.pakai.edit', [
            'barang' => Barang::orderBy('nm_brg', 'ASC')->get(),
            'pemakaian' => $pemakaianBarang,
            'title' => 'Tambah data'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PemakaianBarang  $pemakaianBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemakaianBarang $pemakaianBarang)
    {
        if ($request->kembali) {
            # code...
            $pemakaianBarang->update([
                'tgl_kembali' => $request->tgl_kembali,
                'status' => 'dikembalikan',
            ]);
            return redirect()->route('pemakaian-barang.index')->with('info', 'Berhasil dikembalikan');
        } else {
            $this->validate($request, [
                'nm_brg' => 'required',
                'jml_pakai' => 'required|numeric',
                'ket_pakai' => 'required',
                'tgl_pakai' => 'required',
            ]);

            $pemakaianBarang->update([
                'brg_id' => $request->nm_brg,
                'jml_pakai' => $request->jml_pakai,
                'ket_pakai' => $request->ket_pakai,
                'tgl_pakai' => $request->tgl_pakai,
            ]);
            // Barang::decrement('jml_brg', $request->jml_pakai);
            return redirect()->route('pemakaian-barang.index')->withInfo('Berhasil mengubah data pemakaian barang.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PemakaianBarang  $pemakaianBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemakaianBarang $pemakaianBarang)
    {
        //
    }

    public function info(Request $request, $id)
    {
        $blog = PemakaianBarang::find($id);
        return view('anu');
    }
}
