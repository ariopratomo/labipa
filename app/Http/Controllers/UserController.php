<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Empty_;
use Spatie\Permission\Models\Role;

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
        $role = Role::orderBy('name', 'ASC')->get();

        return view('user.create', [
            'title' => 'Tambah User',
            'role' => $role
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
        $userCreate = $user->create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $userCreate->assignRole($request->role);
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
        $role = Role::orderBy('name', 'ASC')->get();
        return view('user.edit', [
            'title' => 'Ubah data User',
            'user' => $user,
            'role' => $role
        ]);
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
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'email' => "required|string|email|max:255|unique:users,email,$id",
            'nip' => "required|numeric|unique:users,nip,$id",
        ]);
        // if ($request->email === $user->email || $request->nip == $user->nip) {
        //     $this->validate($request, [
        //         'email' => 'required|string|email|max:255',
        //         'nip' => 'required|numeric',
        //     ]);
        // } else {
        //     $this->validate($request, [
        //         'email' => 'required|string|email|max:255|unique:users',
        //         'nip' => 'required|numeric|unique:users',
        //     ]);
        // }
        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $password
        ]);
        $user->roles()->sync([$request->role]);

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
