<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaguPerubahan extends Model
{
    use HasFactory;

    protected $table = 'pagu_perubahan';

    protected $fillable = [
        'uraian_rekening_id',
        'debit',
        'kredit',
    ];

    public function uraian_rekening()
    {
        return $this->belongsTo(UraianRekening::class);
    }
}
