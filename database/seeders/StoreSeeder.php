<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::truncate(); // kosongkan dulu biar tidak duplikat

        Store::create([
            'nama_toko' => 'BrownyGift',
            'deskripsi' => 'Toko kado, hampers, dan bouquet yang menyediakan berbagai pilihan hadiah spesial.',
            'status'    => 'buka',
        ]);
    }
}
