<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\store;

class OwnerController extends Controller
{
    public function karyawanForm()
    {
        return view('dashboard.owner.karyawan');
    }

    public function storeKaryawan(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'no_hp'    => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'id_role'  => 2, // role karyawan
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => bcrypt($request->password) // HASH WAJIB
        ]);

        return back()->with('success', 'Akun karyawan berhasil dibuat!');
    }

    public function listKaryawan()
    {
        $karyawan = User::where('id_role', 2)->orderBy('id_user', 'desc')->get();

        return view('dashboard.owner.karyawan_list', compact('karyawan'));
    }

    public function editKaryawan($id)
    {
        $karyawan = User::findOrFail($id);
        return view('dashboard.owner.karyawan_edit', compact('karyawan'));
    }

    public function updateKaryawan(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $karyawan = User::findOrFail($id);
        $karyawan->nama = $request->nama;
        $karyawan->email = $request->email;
        $karyawan->no_hp = $request->no_hp;

        if ($request->password != null) {
            $karyawan->password = bcrypt($request->password);
        }

        $karyawan->save();

        return redirect('/owner/karyawan_list')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function deleteKaryawan($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect('/owner/karyawan_list')->with('success', 'Karyawan berhasil dihapus!');
    }

    public function showProfilToko()
    {
        $toko = Store::first();

        return view('dashboard.owner.profil_toko', compact('toko'));
    }

    public function editProfilToko()
    {
        $toko = Store::first();
        return view('dashboard.owner.profil_toko_edit', compact('toko'));
    }

    public function updateProfilToko(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'status'    => 'required'
        ]);

        $toko = Store::first();

        $toko->update([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status
        ]);

        return redirect('/owner/profil_toko')->with('success', 'Profil toko berhasil diperbarui!');
    }

}
