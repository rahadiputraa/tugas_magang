<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_jenis_surat')->insert([
            ['judul' => 'Surat Keputusan', 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Surat Undangan', 'created_at' => now(), 'updated_at' => now()],
            // Add more types of surat as needed
        ]);
    }
}
