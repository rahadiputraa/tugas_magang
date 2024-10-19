<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_surat';

    protected $fillable = ['judul', 'no_surat', 'id_type_surat', 'file', 'labels'];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'id_type_surat');
    }
}

