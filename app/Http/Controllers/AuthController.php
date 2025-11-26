<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            $roleName = $user->role->role ?? null;

            if ($roleName === 'owner') {
                return redirect('/owner');
            }

            if ($roleName === 'admin') {
                return redirect('/admin');
            }

            if ($roleName === 'customer' || $roleName === 'user') {
                return redirect('/dashboard');
            }

            return redirect('/dashboard');
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
            'nama' => 'required|unique:users,nama',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required',
            'password' => 'required|min:6',
        ]);

        $customerId = DB::table('roles')->where('role', 'customer')->value('id_role');

        $user = User::create([
            'id_role'  => $customerId,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Kamu berhasil logout.');
    }
}
