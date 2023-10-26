<?php

namespace Database\Seeders;

use App\Models\Aturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_penyakit' => 'P1', 'kode_gejala' => 'G01,G02,G03,G04', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02,K07'],
            ['kode_penyakit' => 'P1', 'kode_gejala' => 'G01,G03,G04', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02,KO7'],
            ['kode_penyakit' => 'P1', 'kode_gejala' => 'G01,G02,G03,G04', 'hasil_lab' => '', 'kode_gejalaPD' => 'K02,K07'],
            ['kode_penyakit' => 'P1', 'kode_gejala' => 'G01,G03,G04', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K07'],
            ['kode_penyakit' => 'P1', 'kode_gejala' => 'G01,G03', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02,K07'],
            ['kode_penyakit' => 'P1', 'kode_gejala' => 'G01,G02,G03,G04,G06,G08,G09', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02,K07'],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02', 'hasil_lab' => 'L01', 'kode_gejalaPD' => ''],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G07', 'hasil_lab' => 'L01', 'kode_gejalaPD' => ''],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01', 'kode_gejalaPD' => ''],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K05'],
            ['kode_penyakit' => 'P3', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01', 'kode_gejalaPD' => 'K05,K06'],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K05'],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L03', 'kode_gejalaPD' => 'K05'],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K05,K06'],
            ['kode_penyakit' => 'P2', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K01,K05'],
            ['kode_penyakit' => 'P3', 'kode_gejala' => 'G01,G02', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K02,K05'],
            ['kode_penyakit' => 'P4', 'kode_gejala' => 'G01,G05,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K05'],
            ['kode_penyakit' => 'P4', 'kode_gejala' => 'G01,G02,G06,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K03,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K03,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G06,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K03,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G05,G06,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K01,K03,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K04,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G05,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K04,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G05,G06,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K01,K03,K04,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G03,G04,G06,G08', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G05,G06', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K01,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G05,G06,G07', 'hasil_lab' => 'L01,L03', 'kode_gejalaPD' => 'K04,K05'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G04,G06,G08', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02,K07'],
            ['kode_penyakit' => 'P5', 'kode_gejala' => 'G01,G02,G03,G04,G07,G09', 'hasil_lab' => 'L02', 'kode_gejalaPD' => 'K02,K07'],
        ];

        foreach ($data as $item) {
            $gejalaArr = explode(',', $item['kode_gejala']);
            sort($gejalaArr);
            $gejalaStr = implode(',', $gejalaArr);

            $labArr = explode(',', $item['hasil_lab']);
            sort($labArr);
            $labStr = implode(',', $labArr);

            $pdArr = explode(',', $item['kode_gejalaPD']);
            sort($pdArr);
            $pdStr = implode(',', $pdArr);

            Aturan::create([
                'kode_penyakit' => $item['kode_penyakit'],
                'kode_gejala' => $gejalaStr,
                'hasil_lab' => $labStr,
                'kode_gejalaPD' => $pdStr,
            ]);
        }
    }
}
