<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = "pertanyaan";

    protected $primaryKey  = "kode_pertanyaan";
    public $incrementing = false;

    protected $fillable = [
        "kode_pertanyaan",
        "urutan",
        "pertanyaan",
        "pilihan_jawaban"
    ];
}
