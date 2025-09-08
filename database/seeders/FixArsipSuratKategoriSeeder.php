<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixArsipSuratKategoriSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil id kategori pertama yang valid
        $kategori = DB::table('kategori_surats')->first();
        if ($kategori) {
            DB::table('arsip_surats')->update(['kategori_id' => $kategori->id]);
        }
    }
}
