<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Empty_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'title' => 'Data User',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            'title' => 'Tambah User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'numeric',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->withInfo('Berhasil menambah user.');
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
    public function edit(User $user)
    {
        return view('user.edit', [
            'title' => 'Ubah data User',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'numeric',],

        ]);
        if ($request->email === $user->email) {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        } else {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        if ($request->password != '') {
            $this->validate($request, ['password' => ['required', 'string', 'min:8', 'confirmed'],]);
            $user->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'email' => $request->email,
            ]);
        }


        return redirect()->route('users.index')->withInfo('Berhasil mengubah user.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Berhasil menghapus user.']);
    }
}
