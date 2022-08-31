<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTujuan extends Model
{
    use HasFactory;

    protected $table = 'bank_tujuan';

    protected $fillable = [
        'jenis_bank_id',
        'nama',
        'no_rek'
    ];

    protected $with = [
        'jenis_bank'
    ];

    public function jenis_bank()
    {
        return $this->belongsTo(JenisBank::class);
    }
}
