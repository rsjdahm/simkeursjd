<?php

namespace App\Models\Rekening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening2 extends Model
{
    use HasFactory;

    protected $table = 'rekening2';

    protected $fillable = [
        'rekening1_id',
        'kode1',
        'kode2',
        'nama'
    ];

    protected $appends = [
        'kode'
    ];

    protected $with = [
        'rekening1'
    ];

    public function rekening1()
    {
        return $this->belongsTo(Rekening1::class);
    }

    public function getKodeAttribute()
    {
        return $this->kode1 . '.' . $this->kode2;
    }
}
