# Praktikum 9 – PHP Modular

## Deskripsi
Proyek ini merupakan hasil Praktikum 9 Pemrograman Web dengan materi PHP Modular. Aplikasi disusun dengan memisahkan konfigurasi database, tampilan, fungsi bantuan, modul fitur, dan aset agar kode lebih terstruktur serta mudah dipelihara.

Proyek menggabungkan latihan PHP modular dengan aplikasi CRUD data barang dari praktikum sebelumnya.

## Tujuan
- Memahami penggunaan `include`, `require`, `include_once`, dan `require_once`.
- Memisahkan template halaman menjadi header, konten, dan footer.
- Membuat fungsi PHP yang dapat digunakan kembali.
- Menyusun struktur folder aplikasi modular.
- Membuat routing dengan daftar route yang diizinkan (*whitelist*) dan halaman 404.
- Mengintegrasikan fitur CRUD dengan database MySQL/MariaDB.
- Menerapkan URL Rewrite menggunakan `.htaccess`.

## Kebutuhan
- Windows atau sistem operasi lain yang mendukung PHP.
- XAMPP (Apache, PHP, dan MySQL/MariaDB).
- Browser.
- Editor kode, misalnya Visual Studio Code.
- Database `latihan1` beserta tabel `data_barang` dari praktikum CRUD sebelumnya.

## Cara Menjalankan

1. Ekstrak folder proyek `Lab9Web` ke direktori `htdocs` milik XAMPP. Contoh:
   `C:\xampp\htdocs\Lab9Web`
2. Jalankan **Apache** dan **MySQL** melalui XAMPP Control Panel.
3. Buka phpMyAdmin melalui `http://localhost/phpmyadmin`.
4. Pastikan database `latihan1` dan tabel `data_barang` sudah tersedia. Jika belum, impor database dari file SQL praktikum CRUD sebelumnya.
5. Periksa konfigurasi koneksi pada `config/database.php`:
   - Host: `localhost`
   - Username: `root`
   - Password: kosong (konfigurasi bawaan XAMPP yang digunakan saat praktikum)
   - Database: `latihan1`
6. Buka aplikasi melalui:
   `http://localhost/Lab9Web/`

   Jika nama folder proyek berbeda, sesuaikan alamat URL dengan nama folder tersebut.

> Catatan: Jika folder proyek tetap bernama `lab9_php_modular`, gunakan `http://localhost/lab9_php_modular/`.

## Struktur Folder

Struktur utama proyek yang digunakan pada praktikum:

```text
Lab9Web/
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── barang.css
│   └── js/
├── config/
│   └── database.php
├── helpers/
│   └── functions.php
├── modules/
│   ├── auth/
│   ├── user/
│   │   ├── add.php
│   │   └── list.php
│   └── barang/
│       ├── gambar/
│       ├── index.php
│       ├── tambah.php
│       ├── ubah.php
│       └── hapus.php
├── views/
│   ├── 404.php
│   ├── dashboard.php
│   ├── header.php
│   └── footer.php
├── .htaccess
└── index.php
```

File latihan terpisah seperti `home.php`, `profil.php`, `kontak.php`, file pengujian include/require, dan latihan fungsi dapat tetap berada di direktori proyek apabila masih digunakan.

## Daftar Route

Aplikasi menggunakan parameter `page` pada `index.php`. Route yang didaftarkan pada router:

| Route | Keterangan |
|---|---|
| `?page=dashboard` | Halaman Dashboard |
| `?page=user/list` | Halaman Data Pengguna |
| `?page=user/add` | Halaman Tambah Pengguna |
| `?page=barang/list` | Menampilkan daftar barang |
| `?page=barang/add` | Memproses/menampilkan halaman tambah barang sesuai implementasi modul |
| `?page=barang/edit` | Route edit barang |
| `?page=barang/delete` | Route hapus barang |

Route yang tidak terdaftar akan diarahkan ke halaman 404. Router memeriksa nilai `page` terhadap daftar route yang telah ditentukan dan tidak menggunakan input URL secara langsung sebagai path file.

Contoh URL:
- `http://localhost/Lab9Web/index.php?page=dashboard`
- `http://localhost/Lab9Web/index.php?page=user/list`
- `http://localhost/Lab9Web/index.php?page=barang/list`

## URL Rewrite

File `.htaccess` digunakan agar route dapat diakses melalui URL yang lebih singkat. Contoh pengujian:

`http://localhost/Lab9Web/dashboard`

Jika URL Rewrite tidak berjalan:
1. Pastikan Apache aktif.
2. Pastikan modul `rewrite_module` diaktifkan pada konfigurasi Apache (`httpd.conf`).
3. Pastikan konfigurasi direktori Apache mengizinkan penggunaan `.htaccess` (`AllowOverride` sesuai konfigurasi server).
4. Restart Apache setelah mengubah konfigurasi.

## Library Function

File `helpers/functions.php` menyimpan fungsi bantuan yang digunakan pada aplikasi/latihan, yaitu:
- `formatRupiah()` – memformat angka menjadi tampilan mata uang Rupiah.
- `hitungDiskon()` – menghitung nilai diskon berdasarkan harga dan persentase.
- `validasiEmail()` – memeriksa format alamat email.
- `ringkasTeks()` – membatasi panjang teks dan menambahkan tanda elipsis.
- `e()` – mengubah karakter khusus HTML agar ditampilkan dengan aman sebagai teks.

## Pengujian CRUD

Fitur CRUD data barang diuji melalui proses:
1. **Read** – menampilkan daftar barang dari database.
2. **Create** – menambahkan data barang baru.
3. **Update** – mengubah informasi barang yang telah tersimpan.
4. **Delete** – menghapus data barang.

Pastikan koneksi database benar dan folder `modules/barang/gambar/` tersedia jika fitur unggah gambar digunakan.

## Pengujian Routing
Pengujian router dilakukan dengan:
- Membuka route yang valid, misalnya `dashboard` dan `barang/list`.
- Membuka route yang tidak terdaftar untuk memastikan halaman 404 muncul.
- Menguji parameter `page` kosong untuk memastikan aplikasi menangani input tersebut.

## Troubleshooting

| Masalah | Pemeriksaan/Penanganan |
|---|---|
| Koneksi database gagal | Periksa Apache/MySQL, nama database, username, password, dan tabel yang digunakan. |
| File tidak ditemukan setelah dipindahkan ke folder modul | Periksa kembali path relatif dan penggunaan `__DIR__`. |
| Route menampilkan 404 | Pastikan nama route sama dengan daftar whitelist pada `index.php`. |
| Gambar barang tidak tampil | Pastikan file gambar berada di folder yang sesuai dan nama file pada database benar. |
| URL tanpa parameter tidak dapat dibuka | Pastikan `.htaccess`, `mod_rewrite`, dan konfigurasi Apache telah aktif. |

## Catatan Pengembangan
- Sesuaikan nama folder pada URL dengan nama folder proyek di `htdocs`.
- Sesuaikan konfigurasi database dengan lingkungan komputer yang digunakan.
- Modul autentikasi dan pembatasan akses dapat dikembangkan pada tahap berikutnya jika belum diterapkan pada proyek praktikum ini.
- Pastikan semua screenshot hasil pengujian dan bukti pengerjaan disertakan pada laporan praktikum.

## Identitas
- Mata Kuliah: Pemrograman Web
- Praktikum: 9 – PHP Modular
- Nama: Muhammad Kabir Fauzan
- NIM: [Isi NIM]
- Kelas: [Isi Kelas]
