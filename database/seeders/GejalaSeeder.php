<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_gejala' => 'G01',
                'nama_gejala' => 'Demam',
                'deskripsi' => 'Suhu tubuh melebihi 37,5 Derajat Celcius.',
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Nyeri Kepala dan Mialgia',
                'deskripsi' => 'Kepala pusing, mual, muntah dan tidak memiliki nafsu makan',
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Kepala pusing, mual, muntah dan tidak memiliki nafsu makan',
                'deskripsi' => 'Mengalami kepala pusing dan tidak nafsu makan',
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Perut kembung, menderita obstipasi ataupun diare',
                'deskripsi' => 'Mengalami pendarahan pada gusi, Hematemesis ataupun meledak',
            ],
            
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Mengalami pendarahan pada gusi, Hematemesis ataupun melena',
                'deskripsi' => 'Mengalami pendarah pada gusi dan muntahan isi lambung bercampur darah, atau regurgitasi darah saja.',
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Mengalami epistaksis (mimisan)',
                'deskripsi' => 'Mimisan adalah kondisi dimana darah keluar dari hidung. Gejala ini dapat terjadi pada penderita DBD.',
            ],
            
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Nyeri retro-orbital (belakang mata) dan artralgia (otot)',
                'deskripsi' => 'Penderita mengalami nyeri di belakang mata dan otot-ototnya.',
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Kepala pusing',
                'deskripsi' => 'Penderita merasa pusing atau pening.',
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Mengalami gangguan mental (menurunnya tingkat kesadaran)',
                'deskripsi' => 'Penderita mengalami penurunan kesadaran atau gangguan mental lainnya.',
            ],
            [
                'kode_gejala' => 'K01',
                'nama_gejala' => 'Memiliki petekia, ekimosis ataupun purpura di badan',
                'deskripsi' => 'Penderita memiliki bintik-bintik merah kecil (petekia), memar (ekimosis), atau bintik-bintik ungu (purpura) pada kulit.',
            ],
            [
                'kode_gejala' => 'K02',
                'nama_gejala' => 'Memiliki lidah yang berselaput',
                'deskripsi' => 'Lidah penderita tampak berselaput atau terdapat perubahan warna pada lidah.',
            ],
            [
                'kode_gejala' => 'K03',
                'nama_gejala' => 'Mengalami kegagal sirkulasi',
                'deskripsi' => 'Penderita mengalami kegagalan dalam sistem sirkulasi darah.',
            ],
            [
                'kode_gejala' => 'K04',
                'nama_gejala' => 'Tekanan darah dan nadi tidak terukur (sangat lemah)',
                'deskripsi' => 'Tekanan darah dan denyut nadi penderita tidak dapat diukur karena kelemahan yang sangat besar.',
            ],
            [
                'kode_gejala' => 'K05',
                'nama_gejala' => 'Uji Bendung Positif',
                'deskripsi' => 'Hasil uji bendung pada penderita DBD positif, menunjukkan adanya perdarahan kecil di bawah kulit.',
            ],
            [
                'kode_gejala' => 'K06',
                'nama_gejala' => 'Efusi Pleura',
                'deskripsi' => 'Penumpukan cairan di antara jaringan yang melapisi paru-paru dan dada.',
            ],
            [
                'kode_gejala' => 'K07',
                'nama_gejala' => 'Hepatomegali',
                'deskripsi' => 'Pembengkakan hati.',
            ],
            [
                'kode_gejala' => 'L01',
                'nama_gejala' => 'Trombosit menurun serta IgM dan IgG positif',
                'deskripsi' => 'Jumlah trombosit dalam darah penderita mengalami penurunan. Hasil tes IgM dan IgG positif menunjukkan adanya infeksi virus dengue.',
            ],
            [
                'kode_gejala' => 'L02',
                'nama_gejala' => 'Aglutinin O dan Aglutinin H Positif',
                'deskripsi' => 'Hasil tes aglutinin O dan aglutinin H pada penderita positif, menunjukkan adanya antibodi terhadap virus dengue.',
            ],
        ];

        Gejala::insert($data);
    }
}
