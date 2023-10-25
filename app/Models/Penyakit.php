<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = "penyakit";
    protected $primaryKey = "kode_penyakit";
    public $incrementing = false;

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'deskripsi'
    ];
}
