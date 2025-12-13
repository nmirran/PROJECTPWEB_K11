@extends('layouts.owner')

@section('title', 'Daftar Karyawan')

@section('content')

<h2 class="text-3xl font-bold text-pink-800 mb-6 text-center">
    Daftar Akun Karyawan
</h2>

<div class="bg-white rounded-3xl shadow-xl p-6">
    <table class="w-full text-center border">
        <thead class="bg-pink-600 text-white">
            <tr>
                <th class="p-3">ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawan as $k)
                <tr class="border-b">
                    <td class="p-3">{{ $k->id_user }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->no_hp }}</td>
                    <td class="space-x-2">
                        <a href="/owner/karyawan_edit/{{ $k->id_user }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">
                            Edit
                        </a>
                        <a href="/owner/karyawan_delete/{{ $k->id_user }}"
                           onclick="return confirm('Yakin hapus?')"
                           class="px-3 py-1 bg-red-600 text-white rounded">
                            Hapus
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-gray-500">Belum ada karyawan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
