<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiGu extends Model
{
    use HasFactory;

    protected $table = 'bukti_gu';

    protected $fillable = [
        'tgl',
        'no',
        'uraian',
        'uraian_rekening_id',
        'rekanan_id',
        'nilai',
    ];

    protected $with = [
        'uraian_rekening',
        'rekanan'
    ];

    public function uraian_rekening()
    {
        return $this->belongsTo(UraianRekening::class);
    }

    public function pajak_gu()
    {
        return $this->hasMany(PajakGu::class);
    }

    public function rekanan()
    {
        return $this->belongsTo(Rekanan::class);
    }

    public static function getLastNoNumber()
    {
        return static::whereRaw("no REGEXP '^[0-9\.]+$'")
            ->latest('no')
            ->value('no');
    }
}
