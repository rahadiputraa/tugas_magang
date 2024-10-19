<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default (optional)
    protected $table = 'tbl_label';

    // Specify the primary key if it's different from the default 'id' (optional)
    protected $primaryKey = 'id';

    // Indicate if the IDs are auto-incrementing (optional)
    public $incrementing = true;

    // Indicate if the model should be timestamped
    public $timestamps = true;

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'title',
    ];

    // Define the hidden fields if any (optional)
    protected $hidden = [
        // No hidden fields in this case
    ];
}
