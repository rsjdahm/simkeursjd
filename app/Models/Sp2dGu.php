<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Riskihajar\Terbilang\Facades\Terbilang;

class Sp2dGu extends Model
{
    use HasFactory;

    protected $table = 'sp2d_gu';

    protected $fillable = [
        'tgl',
        'no',
        'no_cek',
        'uraian',
        'nilai',
    ];

    protected $appends = [
        'no_dokumen'
    ];

    public function getNoDokumenAttribute()
    {
        return str_pad($this->no, 3, '0', STR_PAD_LEFT) . '/SP2D/BLUD-RSJDAHM/' . Terbilang::roman(Carbon::parse($this->tgl)->month) . '/' . Carbon::parse($this->tgl)->year;
    }

    public static function getLastNoNumber()
    {
        return static::whereRaw("no REGEXP '^[0-9\.]+$'")
            ->latest('no')
            ->value('no');
    }
}
