<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAdminsTable extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();  // Adds deleted_at column for soft deletes
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_admins');
    }
}
