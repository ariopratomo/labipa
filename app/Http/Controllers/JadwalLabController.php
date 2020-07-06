<?php

namespace App\Http\Controllers;

use App\JadwalLab;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;

class JadwalLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal.index', [
            'title' =>
            'Jadwal Laboratorium'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal.create', [
            'title' => 'Tambah data jadwal',
            'user' => User::orderBy('nip', 'ASC')->get(),
            'kelas' => Kelas::orderBy('kelas', 'ASC')->get()
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
            'nip' => 'required',
            'mapel' => 'required',
            'hari' => 'required',
            'kelas' => 'required',
            'keterangan' => 'required',
            'jam' => 'required|numeric',
        ]);

        JadwalLab::create([
            'user_id' => $request->nip,
            'mapel' => $request->mapel,
            'hari' => $request->hari,
            'kelas_id' => $request->kelas,
            'keterangan' => $request->keterangan,
            'jam' => $request->jam,
            'status' => 'Menunggu Persetujuan',
        ]);

        return redirect()->route('jadwal.index')->withInfo('Berhasil menambah data jadwal.');
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

        JadwalLab::find($id)->delete();
        return response()->json([
            'success' => 'Item deleted successfully.',
            'message' => 'Berhasil menghapus data jadwal.'
        ]);
    }
}
