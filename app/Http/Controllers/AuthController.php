<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            $user = Auth::user();

            if ($user->id_role == 3) {
                return redirect()->intended('/dashboard');
            }

            if ($user->id_role == 2) {
                return redirect()->intended('/admin');
            }

            if ($user->id_role == 1) {
                return redirect()->intended('/owner');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ])->withInput();
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email',
            'nama'     => 'required',
            'no_hp'    => 'required',
            'password' => 'required|min:6',
        ]);

        $user = Users::create([
            'id_role'     => '3',
            'email'    => $request->email,
            'nama' => $request->nama,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/dashboard')->with('success', 'Registrasi berhasil! Selamat berbelanja!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Kamu berhasil logout.');
    }
}
