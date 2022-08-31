<?php

namespace App\Models\Rekening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening1 extends Model
{
    use HasFactory;

    protected $table = 'rekening1';

    protected $fillable = [
        'kode1',
        'nama'
    ];

    protected $appends = [
        'kode'
    ];

    public function getKodeAttribute()
    {
        return $this->kode1;
    }
}
