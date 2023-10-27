<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
            [
                'kode_pertanyaan' => 'T01',
                'urutan' => 1,
                'pertanyaan' => 'Apakah pasien demam?',
                'pilihan_jawaban' => 'G01',
            ],
            [
                'kode_pertanyaan' => 'T02',
                'urutan' => 2,
                'pertanyaan' => 'Apa saja gejala umum (symptom) pasien?',
                'pilihan_jawaban' => 'G02,G03,G04,G05,G06,G07,G08,G09',
            ],
            [
                'kode_pertanyaan' => 'T03',
                'urutan' => 3,
                'pertanyaan' => 'Bagaimana hasil pemeriksaan selanjutnya?',
                'pilihan_jawaban' => 'K01,K02,K03,K04,K05,K06,K07',
            ],
            [
                'kode_pertanyaan' => 'T04',
                'urutan' => 4,
                'pertanyaan' => 'Bagaimana hasil uji laboratorium?',
                'pilihan_jawaban' => 'L01,L02,L03',
            ],
        ];

        Pertanyaan::insert($data);
    }
}
