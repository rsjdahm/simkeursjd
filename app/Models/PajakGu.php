<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakGu extends Model
{
    use HasFactory;

    protected $table = 'pajak_gu';

    protected $fillable = [
        'bukti_gu_id',
        'potongan_id',
        'nama_wp',
        'npwp',
        'dpp',
        'nilai'
    ];

    protected $with = [
        'potongan',
        'bukti_gu'
    ];

    public function potongan()
    {
        return $this->belongsTo(Potongan::class);
    }

    public function bukti_gu()
    {
        return $this->belongsTo(BuktiGu::class);
    }
}
