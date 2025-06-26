<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('pages.auth.index');
    }

    public function login(Request $request)
    {
        $validasi = $request->validate([
            'name'      => 'required',
            'password'  => 'required',
        ], [
            'name.required'     => 'Jangan kosong!',
            'password.required' => 'Jangan kosong!'
        ]);

        if (Auth::attempt($validasi)) {
            return redirect('/beranda');
        } else {
            return back()->with('failed', true);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
