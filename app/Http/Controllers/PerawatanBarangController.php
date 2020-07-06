<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PerawatanBarang;
use Illuminate\Http\Request;

class PerawatanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.rawat.index', [
            'title' => 'Rawat Barang',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.rawat.create', [
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
    public function store(Request $request, PerawatanBarang $perawatanBarang)
    {
        $this->validate($request, [
            'nm_brg' => 'required',
            'qty' => 'required|numeric',
            'kondisi' => 'required',
            'tgl_rawat' => 'required',
        ]);

        $perawatanBarang->create([
            'brg_id' => $request->nm_brg,
            'qty' => $request->qty,
            'kondisi' => $request->kondisi,
            'tgl_rawat' => $request->tgl_rawat,
        ]);
        Barang::decrement('jml_brg', $request->qty);
        return redirect()->route('perawatan-barang.index')->withInfo('Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
