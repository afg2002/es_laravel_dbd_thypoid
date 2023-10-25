<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_penyakit' => 'P1',
                'nama_penyakit' => 'Demam Typhoid',
                'deskripsi' => 'Demam Typhoid adalah infeksi bakteri yang disebabkan oleh bakteri Salmonella Typhi. Gejala umum termasuk demam tinggi, sakit kepala, mual, muntah, konstipasi, dan kehilangan nafsu makan. Perawatan medis diperlukan untuk mengatasi infeksi.'
            ],
            [
                'kode_penyakit' => 'P2',
                'nama_penyakit' => 'DBD grade I',
                'deskripsi' => 'Demam disertai 2 atau lebih tanda : sakit kepala, nyeri di belakang bola mata, pegal pegal dan nyeri sendi dengan uji bendung positif.'
            ],
            [
                'kode_penyakit' => 'P3',
                'nama_penyakit' => 'DBD grade II',
                'deskripsi' => 'Gejala diatas disertai perdarahan spontan seperti bintik bintik merah di kulit, mimisan, perdarah gusi, muntah darah atau berak hitam.'
            ],
            [
                'kode_penyakit' => 'P4',
                'nama_penyakit' => 'DBD grade III',
                'deskripsi' => 'Gejala diatas disertai kegagalan sirkulasi (kulit dingin dan lembab serta gelisah).'
            ],
            [
                'kode_penyakit' => 'P5',
                'nama_penyakit' => 'DBD grade IV',
                'deskripsi' => 'Renjatan/ syok berat dengan tekanan darah dan nadi tidak terukur.'
            ],
        ];

        Penyakit::insert($data);
    }
}
