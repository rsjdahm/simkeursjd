<?php

namespace App\Models\Rekening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening3 extends Model
{
    use HasFactory;

    protected $table = 'rekening3';

    protected $fillable = [
        'rekening2_id',
        'kode1',
        'kode2',
        'kode3',
        'nama'
    ];

    protected $appends = [
        'kode'
    ];

    protected $with = [
        'rekening2'
    ];

    public function rekening2()
    {
        return $this->belongsTo(Rekening2::class);
    }

    public function getKodeAttribute()
    {
        return $this->kode1 . '.' . $this->kode2 . '.' . $this->kode3;
    }
}
