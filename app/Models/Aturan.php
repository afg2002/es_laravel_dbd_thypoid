<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;


    protected $table = "aturan";
    protected $fillable = [
        'kode_aturan',
        'kode_penyakit',
        'kode_gejala',
        'hasil_lab',
        'gejala_pemeriksaan_dokter',
    ];
}
