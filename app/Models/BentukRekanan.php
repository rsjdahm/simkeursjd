<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukRekanan extends Model
{
    use HasFactory;

    protected $table = 'bentuk_rekanan';

    protected $fillable = [
        'nama'
    ];
}
