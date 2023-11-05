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
                'deskripsi' => 'Demam Typhoid, juga dikenal sebagai demam tifoid, adalah infeksi serius yang disebabkan oleh bakteri Salmonella Typhi. Gejala umum termasuk demam tinggi, sakit kepala, mual, muntah, konstipasi, dan kehilangan nafsu makan. Infeksi ini dapat mempengaruhi sistem pencernaan dan menyebabkan gejala seperti diare atau sembelit.

                Perawatan medis sangat penting dalam mengatasi infeksi demam tifoid. Dokter akan melakukan evaluasi menyeluruh dan mungkin meresepkan antibiotik khusus untuk membantu memerangi bakteri penyebab. Penting untuk mengonsumsi obat sesuai dengan petunjuk dokter dan menyelesaikan seluruh kursus pengobatan.
                
                Selain antibiotik, perawatan pendukung juga diperlukan. Pasien disarankan untuk istirahat yang cukup, minum banyak cairan, dan makan makanan yang mudah dicerna. Jika kehilangan cairan parah terjadi, terapi cairan intravena mungkin diperlukan.
                
                Dalam kasus demam tifoid yang parah atau komplikasi, konsultasi dengan spesialis penyakit menular atau dokter internis dapat diperlukan. Mereka memiliki pengalaman khusus dalam mengelola kondisi infeksi seperti demam tifoid dan dapat memberikan saran serta perawatan tambahan yang diperlukan.'
            ],
            [
                'kode_penyakit' => 'P2',
                'nama_penyakit' => 'DBD grade I',
                'deskripsi' => 'Demam Berdarah Dengue (DBD) Grade I adalah tingkatan ringan dari penyakit DBD. Pada tingkatan ini, pasien biasanya mengalami gejala seperti demam tinggi, sakit kepala, nyeri otot dan sendi, serta ruam kulit. Meskipun gejala ini dapat menyebabkan ketidaknyamanan, komplikasi serius jarang terjadi pada tingkatan ini.

                Penting untuk mencari perawatan medis segera jika Anda mengalami gejala DBD Grade I. Dokter akan melakukan evaluasi menyeluruh dan memberikan perawatan yang sesuai. Pasien mungkin direkomendasikan untuk istirahat yang cukup, minum banyak cairan, dan mengonsumsi obat pereda demam atau nyeri seperti parasetamol.
                
                Saat mengalami DBD Grade I, penting untuk memantau gejala Anda dan menghubungi dokter jika ada perubahan atau jika gejala memburuk. Konsultasi dengan dokter akan membantu memastikan bahwa Anda menerima perawatan yang tepat dan meminimalkan risiko komplikasi lebih lanjut.'
            ],
            [
                'kode_penyakit' => 'P3',
                'nama_penyakit' => 'DBD grade II',
                'deskripsi' => 'Demam Berdarah Dengue (DBD) Grade II adalah tingkatan sedang dari penyakit DBD. Pada tingkatan ini, pasien mengalami gejala yang lebih intens dibandingkan dengan DBD Grade I. Gejalanya meliputi demam tinggi yang berlangsung selama beberapa hari, nyeri otot dan sendi, sakit kepala parah, muntah, perdarahan ringan seperti mimisan atau bintik merah pada kulit, serta penurunan jumlah trombosit dalam darah.

                Perawatan medis sangat penting pada tingkatan ini. Pasien mungkin membutuhkan rawat inap di rumah sakit untuk pemantauan dan perawatan lebih intensif. Dokter akan memberikan terapi cairan intravena untuk menjaga keseimbangan cairan dan elektrolit. Selain itu, pasien mungkin membutuhkan obat pereda demam atau nyeri, dan jika perdarahan lebih serius, transfusi darah juga dapat diperlukan.
                
                Penting untuk menghubungi dokter segera jika Anda mengalami gejala DBD Grade II. Penanganan medis yang cepat dan tepat dapat membantu mengurangi risiko komplikasi serius dan memastikan pemulihan yang optimal.'
            ],
            [
                'kode_penyakit' => 'P4',
                'nama_penyakit' => 'DBD grade III',
                'deskripsi' => 'Demam Berdarah Dengue (DBD) Grade III adalah tingkatan yang lebih parah dari penyakit DBD. Pada tingkatan ini, pasien mengalami gejala yang sangat serius dan membutuhkan perawatan medis segera. Gejala yang dapat muncul meliputi:

                1.Demam Tinggi: Demam sangat tinggi dan berlangsung selama beberapa hari.
                2.Nyeri Otot dan Sendi: Nyeri pada otot dan sendi dapat menjadi lebih parah dan mengganggu aktivitas sehari-hari.
                3.Sakit Kepala Parah: Sakit kepala dapat menjadi sangat parah dan menimbulkan ketidaknyamanan yang signifikan.
                4.Muntah Berulang: Pasien mungkin mengalami muntah berulang kali.
                5.Perdarahan yang Serius: Perdarahan serius dapat terjadi, termasuk mimisan yang sulit dihentikan, bintik-bintik merah pada kulit yang membesar, atau perdarahan dari gusi atau hidung.
                6.Kehilangan Nafsu Makan yang Parah: Pasien mungkin kehilangan nafsu makan secara signifikan.
            
            Pada DBD Grade III, rawat inap di rumah sakit adalah keharusan. Pasien akan mendapatkan perawatan intensif termasuk terapi cairan intravena untuk menjaga keseimbangan cairan dan elektrolit, transfusi darah jika diperlukan, serta pengawasan ketat oleh tim medis.
            
            Penting untuk segera mencari bantuan medis jika Anda atau seseorang mengalami gejala DBD Grade III. Penanganan yang cepat dan tepat sangat penting untuk mengurangi risiko komplikasi serius dan meningkatkan peluang pemulihan.'
            ],
            [
                'kode_penyakit' => 'P5',
                'nama_penyakit' => 'DBD grade IV',
                'deskripsi' => 'DBD Grade IV adalah tingkatan yang paling serius dari penyakit Demam Berdarah Dengue (DBD). Pada tingkatan ini, pasien mengalami kondisi darurat medis dan memerlukan perawatan segera di unit perawatan intensif. Gejala yang dapat muncul meliputi:

                    Demam Tinggi yang Persisten: Demam mencapai suhu tinggi dan berlangsung terus menerus.
                    Sakit Kepala Parah: Sakit kepala sangat intens dan mengganggu fungsi sehari-hari.
                    Nyeri Otot dan Sendi yang Parah: Nyeri pada otot dan sendi menjadi sangat parah dan menyakitkan.
                    Muntah Berulang: Pasien mungkin mengalami muntah berulang kali.
                    Perdarahan Serius dan Mematikan: Perdarahan serius dapat terjadi di berbagai bagian tubuh, termasuk internal dan eksternal.
                    Tekanan Darah Rendah: Pasien mungkin mengalami penurunan tekanan darah yang signifikan.
                    Gangguan Pernapasan: Pernapasan dapat menjadi cepat dan dangkal.
                    Kesadaran Menurun: Pasien mungkin mengalami penurunan kesadaran hingga keadaan koma.
                
                Pada tingkatan ini, penanganan medis segera dan intensif adalah mutlak. Pasien membutuhkan perawatan di unit perawatan intensif rumah sakit dengan tim medis yang terlatih dalam mengatasi kondisi medis darurat. Perawatan meliputi terapi cairan intravena, transfusi darah, dan pengawasan ketat oleh tim medis.
                
                DBD Grade IV merupakan kondisi yang mengancam nyawa dan harus ditangani dengan sangat serius. Jika Anda atau seseorang mengalami gejala DBD Grade IV, segera cari bantuan medis secepat mungkin.'
            ],
        ];

        Penyakit::insert($data);
    }
}
