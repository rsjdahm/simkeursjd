<?php

namespace App\Models\Rekening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening5 extends Model
{
    use HasFactory;

    protected $table = 'rekening5';

    protected $fillable = [
        'rekening4_id',
        'kode1',
        'kode2',
        'kode3',
        'kode4',
        'kode5',
        'nama'
    ];

    protected $appends = [
        'kode'
    ];

    protected $with = [
        'rekening4'
    ];

    public function rekening4()
    {
        return $this->belongsTo(Rekening4::class);
    }

    public function getKodeAttribute()
    {
        return $this->kode1 . '.' . $this->kode2 . '.' . $this->kode3 . '.' . str_pad($this->kode4, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kode5, 2, '0', STR_PAD_LEFT);
    }
}
