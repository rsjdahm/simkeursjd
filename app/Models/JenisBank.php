<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBank extends Model
{
    use HasFactory;

    protected $table = 'jenis_bank';

    protected $fillable = [
        'nama',
        'kode'
    ];
}
