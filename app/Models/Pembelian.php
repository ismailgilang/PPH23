<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice',
        'name',
        'product',
        'nohp',
        'harga',
        'hargapph',
        'status',
        'created_at',
    ];
}
