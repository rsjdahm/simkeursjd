<?php

namespace App\Models;

use App\Models\Rekening\Rekening6;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianRekening extends Model
{
    use HasFactory;

    protected $table = 'uraian_rekening';

    protected $fillable = [
        'rekening6_id',
        'nama'
    ];

    protected $with = [
        'rekening6'
    ];

    public function rekening6()
    {
        return $this->belongsTo(Rekening6::class);
    }

    public function pagu_murni()
    {
        return $this->hasOne(PaguMurni::class);
    }
}
