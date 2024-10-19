<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_surat')->insert([
            'judul' => 'Contoh Surat',
            'no_surat' => 'SK/001',
            'id_type_surat' => 1,  // Assuming 1 is for 'Surat Keputusan'
            'file' => 'path_to_file.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
