<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_label')->insert([
            ['title' => 'Label 1'],
            ['title' => 'Label 2'],
            ['title' => 'Label 3'],
            // Add more labels as needed
        ]);
    }
}
