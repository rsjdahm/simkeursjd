<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Riskihajar\Terbilang\Facades\Terbilang;

class SpjGu extends Model
{
    use HasFactory;

    protected $table = 'spj_gu';

    protected $fillable = [
        'tgl',
        'no',
    ];

    protected $appends = [
        'no_dokumen',
        'no_dokumen_spp',
    ];

    public function getNoDokumenAttribute()
    {
        return str_pad($this->no, 3, '0', STR_PAD_LEFT) . '/SPM-GU/BLUD-RSJDAHM/' . Terbilang::roman(Carbon::parse($this->tgl)->month) . '/' . Carbon::parse($this->tgl)->year;
    }

    public function getNoDokumenSppAttribute()
    {
        return str_pad($this->no, 3, '0', STR_PAD_LEFT) . '/SPP-GU/BLUD-RSJDAHM/' . Terbilang::roman(Carbon::parse($this->tgl)->month) . '/' . Carbon::parse($this->tgl)->year;
    }

    public static function getLastNoNumber()
    {
        return static::whereRaw("no REGEXP '^[0-9\.]+$'")
            ->latest('no')
            ->value('no');
    }
}
