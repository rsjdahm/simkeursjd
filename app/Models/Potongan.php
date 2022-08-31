<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    protected $table = 'potongan';

    protected $fillable = [
        'jenis_potongan_id',
        'nama',
        'kode_map',
        'tarif',
        'perhitungan',
        'is_dpp_harga_jual'
    ];

    protected $with = [
        'jenis_potongan'
    ];

    public function jenis_potongan()
    {
        return $this->belongsTo(JenisPotongan::class);
    }
}
