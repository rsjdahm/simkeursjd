<?php

namespace App\Models\Rekening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening6 extends Model
{
    use HasFactory;

    protected $table = 'rekening6';

    protected $fillable = [
        'rekening5_id',
        'kode1',
        'kode2',
        'kode3',
        'kode4',
        'kode5',
        'kode6',
        'nama'
    ];

    protected $appends = [
        'kode'
    ];

    protected $with = [
        'rekening5'
    ];

    public function rekening5()
    {
        return $this->belongsTo(Rekening5::class);
    }

    public function getKodeAttribute()
    {
        return $this->kode1 . '.' . $this->kode2 . '.' . $this->kode3 . '.' . str_pad($this->kode4, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kode5, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kode6, 4, '0', STR_PAD_LEFT);
    }
}
