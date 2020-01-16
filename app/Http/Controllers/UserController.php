<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest ;

class UserController extends Controller
{

    /**
     * Mostra lista de usuarios
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();

        session()->flash('success', 'Usuario '.$user->name.' agora e administrador');

        return redirect()->back();
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user =  auth()->user();

        $user->update([
            'name' => $request->name,
            'sobre' => $request->sobre
        ]);

        session()->flash('success', 'Usuario '.$user->name.' Atualizado');

        return redirect()->back();
    }
}
