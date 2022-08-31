<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekanan extends Model
{
    use HasFactory;

    protected $table = 'rekanan';

    protected $fillable = [
        'nama',
        'bentuk_rekanan_id',
        'npwp',
        'alamat',
        'nama_pimpinan',
        'nama_rek',
        'no_rek',
        'jenis_bank_id',
        'no_telp',
    ];

    protected $with = [
        'bentuk_rekanan',
        'jenis_bank'
    ];

    public function jenis_bank()
    {
        return $this->belongsTo(JenisBank::class);
    }

    public function bentuk_rekanan()
    {
        return $this->belongsTo(BentukRekanan::class);
    }
}
