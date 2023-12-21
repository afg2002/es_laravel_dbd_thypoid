# Aplikasi Expert System untuk Diagnosa DBD dan Thypoid



Aplikasi ini adalah sebuah sistem pakar yang dikembangkan menggunakan Laravel untuk melakukan diagnosa penyakit Demam Berdarah Dengue (DBD) dan Thypoid. Metode yang digunakan dalam sistem ini adalah Forward Chaining.

## Fitur Utama

- Diagnosa DBD dan Thypoid berdasarkan gejala-gejala yang diberikan.
- Langkah-langkah yang jelas untuk membantu pengguna dalam melakukan diagnosa.
- Penyimpanan riwayat diagnosa untuk referensi mendatang. (on progress)
- Desain antarmuka yang intuitif dan ramah pengguna.

## Cara Penggunaan

1. Pastikan Anda memiliki PHP dan Composer terinstall di komputer Anda.
2. Clone repositori ini ke komputer Anda.
3. Jalankan `composer install` untuk menginstal dependensi.
4. Salin file `.env.example` menjadi `.env` dan konfigurasi koneksi database.
5. Jalankan `php artisan key:generate` untuk menghasilkan kunci aplikasi.
6. Jalankan migrasi database menggunakan perintah `php artisan migrate --seed`.
7. Mulai server lokal dengan perintah `php artisan serve`.
8. Buka aplikasi di browser Anda dan mulai diagnosa penyakit.

## Kontribusi

Jika Anda ingin berkontribusi pada pengembangan aplikasi ini, silakan ikuti langkah berikut:

1. Fork repositori ini.
2. Buat branch baru (`git checkout -b fitur-baru`).
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`).
4. Push ke branch Anda (`git push origin fitur-baru`).
5. Buat Pull Request baru.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
