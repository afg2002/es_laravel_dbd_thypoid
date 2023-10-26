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

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }

    public function gejalaPD()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejalaPD', 'kode_gejala');
    }

    public function hasilLab()
    {
        return $this->belongsTo(Gejala::class, 'hasil_lab', 'kode_gejala');
    }
}
