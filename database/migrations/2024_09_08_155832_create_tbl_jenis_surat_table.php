<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJenisSuratTable extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_jenis_surat', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_jenis_surat');
    }
}
