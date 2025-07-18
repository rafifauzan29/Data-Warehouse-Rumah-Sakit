# 🏥 Data Warehouse Rumah Sakit

> Aplikasi Web Sederhana untuk memproses dan menganalisis data kunjungan pasien berdasarkan data **dimensi** menjadi **fakta** menggunakan Laravel + OLAP Pivot Table (WebDataRocks).

---

## 📌 Deskripsi Proyek

**Data Warehouse Rumah Sakit** adalah aplikasi berbasis web yang dibangun dengan Laravel untuk membantu menganalisis data kunjungan pasien dengan pendekatan **star schema**. Aplikasi ini menampilkan data dari berbagai dimensi seperti pasien, dokter, diagnosa, ruang, dan waktu, yang kemudian diringkas ke dalam **fakta kunjungan**.

Dilengkapi fitur filter lengkap dan integrasi **pivot table OLAP** untuk eksplorasi data yang fleksibel.

---

## 📊 Fitur Utama

✅ Manajemen dan tampilan data dari tabel dimensi:

* `dim_pasien`: Data pasien (nama, umur, jenis kelamin, dsb.)
* `dim_dokter`: Data dokter dan biaya jasa
* `dim_diagnosa`: Diagnosa penyakit dan biaya pengobatan
* `dim_ruang`: Ruangan dan biaya perawatan
* `dim_waktu`: Tanggal kunjungan, tahun, bulan, dll.

✅ Pengolahan data kunjungan (`fakta_kunjungan`) dengan:

* Total biaya otomatis dari dimensi terkait
* Filter berdasarkan tanggal, dokter, diagnosa, ruang, jenis kelamin, umur, nama pasien, dan tahun
* Tampilkan seluruh data atau paginasi dinamis

✅ Analisis Data dengan:

* 🔀 Pivot Table (OLAP) dengan [WebDataRocks](https://www.webdatarocks.com/)
* Roll-up, drill-down, dan drag-n-drop field
* Format mata uang untuk kolom biaya

✅ UI Responsif & Pagination Rapi

---

## 💡 Teknologi yang Digunakan

* ⚙️ Laravel 10.x
* 🐘 MySQL
* �� WebDataRocks (OLAP Pivot Table)
* 🎨 Bootstrap 5
* 📊 Eloquent ORM
* 📁 MVC Architecture

---

## 📷 Tampilan Aplikasi

| Halaman Kunjungan Pasien                                                                   | Pivot Table OLAP                                                           |
| ------------------------------------------------------------------------------------------ | -------------------------------------------------------------------------- |
| ![Halaman Kunjungan](https://via.placeholder.com/600x300?text=Screenshot+Kunjungan+Pasien) | ![Pivot OLAP](https://via.placeholder.com/600x300?text=Pivot+WebDataRocks) |

---

## 🚀 Cara Menjalankan Proyek

1. **Clone Repo**

   ```bash
   git clone https://github.com/namamu/data-warehouse-rumah-sakit.git
   cd data-warehouse-rumah-sakit
   ```

2. **Install Dependency**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Konfigurasi Environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup Database**

   * Buat database baru di MySQL (misalnya: `dw_rumahsakit`)
   * Edit `.env`:

     ```
     DB_DATABASE=dw_rumahsakit
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Migrasi dan Seeding**

   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan Server**

   ```bash
   php artisan serve
   ```

7. **Akses**

   * Buka browser: `http://127.0.0.1:8000`

---

## 📁 Struktur Data

### 🧙‍ Dimensi

| Tabel          | Penjelasan                       |
| -------------- | -------------------------------- |
| `dim_pasien`   | Info pasien (nama, umur, gender) |
| `dim_dokter`   | Nama & biaya jasa dokter         |
| `dim_diagnosa` | Penyakit & biaya pengobatan      |
| `dim_ruang`    | Jenis & biaya ruang inap         |
| `dim_waktu`    | Kalender waktu kunjungan pasien  |

### 📌 Fakta

| Tabel             | Penjelasan                                                 |
| ----------------- | ---------------------------------------------------------- |
| `fakta_kunjungan` | Menyimpan kunjungan pasien, relasi ke dimensi, total biaya |

---

## 🎯 Tujuan dan Manfaat

* 📈 Meningkatkan efisiensi analisis data rumah sakit
* 🏥 Mendukung keputusan operasional dan manajerial
* 🔍 Memudahkan eksplorasi data menggunakan Pivot Table interaktif

---

## 📚 Dokumentasi Tambahan

* [Laravel Documentation](https://laravel.com/docs)
* [WebDataRocks Docs](https://www.webdatarocks.com/doc/)

---

## 👨‍💻 Kontributor

* Rafi Fauzan – *Fullstack Developer* 🚀

---

## ⚖️ Lisensi

Aplikasi ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
