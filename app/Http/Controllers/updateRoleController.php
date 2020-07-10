<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class updateRoleController extends Controller
{
    public function update(Request $request, User $user)
    {
        $update = $user->assignRole($request->role);
        $return = ($update) ? "Berhasil" : "Gagal";
        return $request->role;
    }
}
