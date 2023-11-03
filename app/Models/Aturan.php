<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $table = 'aturan';

    protected $fillable = [
        'kode_aturan',
        'kode_penyakit',
        'kode_gejala',
        'hasil_lab',
        'kode_gejalaPD',
    ];

    // Definisikan relasi dengan model Penyakit dan model Gejala
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit', 'kode_penyakit');
    }

    
}
