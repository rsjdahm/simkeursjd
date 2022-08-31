<?php

namespace App\Models\Rekening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening4 extends Model
{
    use HasFactory;

    protected $table = 'rekening4';

    protected $fillable = [
        'rekening3_id',
        'kode1',
        'kode2',
        'kode3',
        'kode4',
        'nama'
    ];

    protected $appends = [
        'kode'
    ];

    protected $with = [
        'rekening3'
    ];

    public function rekening3()
    {
        return $this->belongsTo(Rekening3::class);
    }

    public function getKodeAttribute()
    {
        return $this->kode1 . '.' . $this->kode2 . '.' . $this->kode3 . '.' . str_pad($this->kode4, 2, '0', STR_PAD_LEFT);
    }
}
