# Sistem Pendaftaran Seminar (SeminarKuApp)

##Angger tirta tetalen mukti
##2200018135
##Pemrograman Web Dinamis Kelas C
Sistem ini adalah aplikasi sederhana berbasis web untuk manajemen peserta seminar. Sistem mendukung fitur admin untuk manajemen user, seminar, serta mengelola peserta dalam seminar, dan juga fitur user untuk registrasi serta melihat seminar yang diikuti.

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lokal:

1. **Download Repository:**
   - Download repository ini sebagai file `.zip` dan ekstrak di direktori lokal Anda.

2. **Import Database:**
   - Upload file `mariseminar.sql` ke dalam DBMS (Database Management System) Anda.

3. **Konfigurasi Koneksi:**
   - Periksa dan sesuaikan pengaturan koneksi database di `config/conn.php` sesuai dengan konfigurasi lokal Anda.

4. **Menjalankan Aplikasi:**
   - Buka aplikasi di browser dengan menjalankan `index.php` di `localhost`.

## Login Aplikasi

Untuk masuk sebagai **Admin**, gunakan kredensial berikut:
- **Username:** supriyanto@gmail.com
- **Password:** 12345

Untuk pengguna umum, Anda bisa melakukan registrasi terlebih dahulu sebelum login.

## Fitur Aplikasi

### Admin
Admin memiliki akses untuk melakukan beberapa fungsi utama, yaitu:
- **Manajemen Participant (User):** CRUD (Create, Read, Update, Delete) peserta seminar.
- **Manajemen Seminar:** CRUD untuk mengelola data seminar.
- **Menambahkan Participant ke Seminar:** Menambahkan peserta ke dalam sebuah seminar.

### User
Pengguna umum memiliki akses ke fitur berikut:
- **Login/Registrasi:** Registrasi untuk membuat akun baru atau login ke sistem.
- **Seminar Saya:** Melihat daftar seminar yang telah diikuti oleh pengguna.

## Dokumentasi

Detail lebih lanjut mengenai dokumentasi aplikasi beserta screenshot dapat ditemukan di folder `documentation` pada link berikut.
'https://drive.google.com/drive/folders/17nI1sgdLTHChMJt1kPUTCZYDZ9t29cED?usp=sharing'

---

*Terima kasih telah menggunakan sistem ini. Kami harap aplikasi ini dapat memudahkan Anda dalam mengelola seminar dan peserta.*

