<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSuratSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_surats')->insert([
            ['nama_kategori' => 'Undangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Pengumuman', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Nota Dinas', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Pemberitahuan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
