<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',

            'password' => 'nullable|string|min:8|confirmed'

        ]);
        if ($request->nip == $user->nip) {
            $this->validate($request, [
                'nip' => 'required|numeric',
            ]);
        } else {
            $this->validate($request, [
                'nip' => 'required|numeric|unique:users',
            ]);
        }
        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => $password
        ]);

        return redirect()->route('profile')->withInfo('Berhasil mengubah profile.');
    }
}
