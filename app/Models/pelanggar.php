<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'poin_pelanggar',
        'status_pelanggar',
        'status',
    ];
}
