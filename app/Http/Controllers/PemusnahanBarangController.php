<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PemusnahanBarang;
use Illuminate\Http\Request;

class PemusnahanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.musnah.index', [
            'title' => 'Pemusnahan Barang',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.musnah.create', [
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
    public function store(Request $request, PemusnahanBarang $pemusnahanBarang)
    {
        $this->validate($request, [
            'nm_brg' => 'required',
            'jml_musnah' => 'required|numeric',
            'keterangan' => 'required',
            'tgl_musnah' => 'required',
        ]);

        $pemusnahanBarang->create([
            'brg_id' => $request->nm_brg,
            'jml_musnah' => $request->jml_musnah,
            'keterangan' => $request->keterangan,
            'tgl_musnah' => $request->tgl_musnah,
        ]);
        Barang::decrement('jml_brg', $request->jml_musnah);
        return redirect()->route('pemusnahan-barang.index')->withInfo('Data berhasil ditambah.');
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
