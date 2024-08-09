<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'thp',
        'mutu_gaji',
        'pph23',
        'jabatan',
        'created_at',
    ];
}
