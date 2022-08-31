<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaguMurni extends Model
{
    use HasFactory;

    protected $table = 'pagu_murni';

    protected $fillable = [
        'uraian_rekening_id',
        'nilai',
    ];

    protected $with = [
        'uraian_rekening'
    ];

    public function uraian_rekening()
    {
        return $this->belongsTo(UraianRekening::class);
    }
}
