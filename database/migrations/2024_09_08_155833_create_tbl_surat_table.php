<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSuratTable extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_surat', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('no_surat');
            $table->unsignedBigInteger('id_type_surat');
            $table->string('file');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_type_surat')->references('id')->on('tbl_jenis_surat')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_surat');
    }
}
