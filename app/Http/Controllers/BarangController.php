<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // return view('barang.index', [
        //     'title' => 'Data Barang - Lab IPA',
        // ]);
        return "Barang";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create', [
            'title' => 'Tambah data Barang'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_brg' => 'required',
            'jml_brg' => 'required|numeric',
        ]);

        Barang::create([
            'nm_brg' => $request->nm_brg,
            'jml_brg' => $request->jml_brg,
        ]);

        return redirect()->route('barang.index')->withInfo('Data barang berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'title' => 'Ubah data Barang',
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {

        $this->validate($request, [
            'nm_brg' => 'required',
            'jml_brg' => 'required|numeric',
        ]);

        $barang->update([
            'nm_brg' => $request->nm_brg,
            'jml_brg' => $request->jml_brg,
        ]);

        return redirect()->route('barang.index')->withInfo('Data barang berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        return response()->json([
            'success' => 'Item deleted successfully.',
            'message' => 'Data barang berhasil dihapus.'
        ]);
    }
}
