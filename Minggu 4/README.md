# Praktikum PWL - Jobsheet 04 - Eloquent ORM

## Identitas
- **Nama:** Dika Arie Arrifky  
- **NIM:** 2341720232  
- **Kelas:** TI-2A  

# Praktikum 1 - $fillable

## 1. Buka file model dengan nama UserModel.php dan tambahkan $fillable

<img src="imgSS/Praktikum 1/1.png">

## 2. Buka file controller dengan nama UserController.php dan ubah script untuk menambahkan data baru

<img src="imgSS/Praktikum 1/2.png">

## 3. Simpan kode program Langkah 1 dan 2, dan jalankan perintah web server. Kemudian jalankan link localhostPWL_POS/public/user pada browser

<img src="imgSS/Praktikum 1/3.png">

## 4. Ubah file model UserModel.php seperti pada gambar di bawah ini pada bagian $fillable

<img src="imgSS/Praktikum 1/4.png">

## 5. Ubah kembali file controller UserController.php seperti pada gambar di bawah hanya bagian array pada $data

<img src="imgSS/Praktikum 1/5.png">

## 6. Simpan kode program Langkah 4 dan 5. Kemudian jalankan pada browser dan amati apa yang terjadi

<img src="imgSS/Praktikum 1/6.png">

## Terjadi eror karena di protected $fillable tidak ada password saat di insert


---

# Praktikum 2.1 – Retrieving Single Models

## 1. Buka file controller dengan nama UserController.php dan ubah script

<img src="imgSS/Praktikum 2/1.png">


## 2. Buka file view dengan nama user.blade.php dan ubah script

<img src="imgSS/Praktikum 2/2.png">


## 3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/3.png">


**Data yang ditampilkan hanya data idlevel 1**

## 4. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

<img src="imgSS/Praktikum 2/4.png">


## 5. Simpan kode program Langkah 4. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/5.png">


**Data menampilkan user id 1 jika tidak maka akan not found**

## 6. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah

<img src="imgSS/Praktikum 2/6.png">


## 7. Simpan kode program Langkah 6. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/7.png">


## 8. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

<img src="imgSS/Praktikum 2/8.png">


## 9. Simpan kode program Langkah 8. Kemudian pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/9.png">


**Program tersebut akan mencari id 1 dan akan menampilkan username dan nama**

## 10. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

<img src="imgSS/Praktikum 2/10.png">


## 11. Simpan kode program Langkah 10. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/11.png">


**User 20 tidak ditemukan maka akan menampilkan fungsi dari 404**


# Praktikum 2.2 – Not Found Exceptions

## 1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

<img src="imgSS/Praktikum 2/22.png">


## 2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/222.png">


**Pada browser ditampilkan user id 1, username, nama, dan id level pengguna**

## 3. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

<img src="imgSS/Praktikum 2/223.png">


## 4. Simpan kode program Langkah 3. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/224.png">


**Data manager 9 not found maka akan tampil mengembalikan function findOrFail()**

---

# Praktikum 2.3 – Retrieving Aggregates

## 1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

<img src="imgSS/Praktikum 2/231.png">


## 2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

<img src="imgSS/Praktikum 2/232.png">


**Menghitung record pada level id 2**

## 3. Buat agar jumlah script pada langkah 1 bisa tampil pada halaman browser, sebagai contoh bisa lihat gambar di bawah ini dan ubah script pada file view supaya bisa muncul datanya

<img src="imgSS/Praktikum 2/233.png">
<img src="imgSS/Praktikum 2/2333.png">
<img src="imgSS/Praktikum 2/23333.png">

# Praktikum 2.4 – Retrieving or Creating Models

## 1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/24.png">

## 2. Ubah kembali file view dengan nama user.blade.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/242.png">


## 3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/243.png">


**Data 2 ditemukan dan tampil di web browser, jika tidak maka akan membuat data baru.**

## 4. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/244.png">


## 5. Simpan kode program Langkah 4. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user serta beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/245.png">

**Data baru dibuat dikarenakan pada data sebelumnya ID tidak ditemukan.**

## 6. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/246.png">


## 7. Simpan kode program Langkah 6. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/247.png">


## 8. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/248.png">


**User 2 ditemukan dikarenakan sudah ada pada data sebelumnya. Jika tidak ada, maka akan dibuat objek baru tetapi tidak langsung disimpan ke dalam database.**

## 9. Simpan kode program Langkah 9. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user serta beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/249">

**Berhasil membuat objek namun tidak langsung disimpan dalam database. Jika ingin menyimpan langsung, harus menambahkan user->save().**

## 10. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/2499.png">


## 11. Simpan kode program Langkah 9. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user serta beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/24999.png">


**Data berhasil disimpan dalam database dikarenakan sudah menambahkan kode $user->save().**

---

# Praktikum 2.5 – Attribute Changes

## 1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/25.png">


## 2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/252.png">


**Hasil false berarti atribut belum pernah terganti.**

## 3. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini.
<img src="imgSS/Praktikum 2/253.png">


## 4. Simpan kode program Langkah 3. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan.
<img src="imgSS/Praktikum 2/254.png">


   **Hasil true berarti atribut sudah pernah terganti.**

# Praktikum 2.6 – Create, Read, Update, Delete (CRUD)

## 1. Menampilkan Data User
## Buka file `user.blade.php` pada folder `resources/views/` dan ubah scriptnya sesuai instruksi yang diberikan.
<img src="imgSS/Praktikum 2/26.png">


## 2. Membuat Controller untuk Read Data
## Buka file `UserController.php` pada folder `app/Http/Controllers/` dan ubah scriptnya untuk menampilkan data pengguna sesuai dengan perintah.
<img src="imgSS/Praktikum 2/262.png">

## 3. Menjalankan Program dan Observasi
## Simpan perubahan dan jalankan project pada browser. 
<img src="imgSS/Praktikum 2/263.png">

## - Tabel user berhasil ditampilkan.
## - Fitur CRUD belum dapat digunakan karena belum dibuat sepenuhnya.

## 4. Membuat Form Tambah Data User
## Buat file baru `user_tambah.blade.php` pada folder `resources/views/` dan tambahkan script yang sesuai.
<img src="imgSS/Praktikum 2/264.png">

## 5. Menambahkan Route untuk Tambah Data
## Buka file `web.php` pada folder `routes/` dan tambahkan script untuk mengarahkan ke halaman tambah user.
<img src="imgSS/Praktikum 2/265.png">


## 6. Menambahkan Method Tambah di Controller
## Buka `UserController.php` dan tambahkan method `tambah()` di bawah method `index`.
<img src="imgSS/Praktikum 2/266.png">


## 7. Menjalankan Program dan Observasi
## Jalankan aplikasi dan klik link `+ Tambah User`. 
<img src="imgSS/Praktikum 2/267.png">

## - Halaman tambah user berhasil ditampilkan.

## 8. Menambahkan Route untuk Simpan Data
## Tambahkan route pada `web.php` untuk menyimpan data yang ditambahkan.
<img src="imgSS/Praktikum 2/268.png">


## 9. Menambahkan Method Simpan Data di Controller
## Tambahkan method `tambah_simpan()` pada `UserController.php` untuk menangani penyimpanan data.
<img src="imgSS/Praktikum 2/269.png">


## 10. Menjalankan Program dan Observasi
## Jalankan aplikasi, akses `localhost:8000/user/tambah`, isi form, dan klik simpan.
<img src="imgSS/Praktikum 2/270.png">
<img src="imgSS/Praktikum 2/2701.png">


## - Data berhasil disimpan ke dalam database.

## 11. Membuat Form Ubah Data User
## Buat file baru `user_ubah.blade.php` pada folder `resources/views/` dan tambahkan script sesuai instruksi.
<img src="imgSS/Praktikum 2/271.png.png">


## 12. Menambahkan Route untuk Ubah Data
## Tambahkan script pada `web.php` untuk mengarahkan ke halaman ubah user.
<img src="imgSS/Praktikum 2/272.png">


## 13. Menambahkan Method Ubah di Controller
## Tambahkan method `ubah()` pada `UserController.php` di bawah method `tambah_simpan()`.
<img src="imgSS/Praktikum 2/273.png">


## 14. Menjalankan Program dan Observasi
## Jalankan aplikasi dan klik link `Ubah`.
<img src="imgSS/Praktikum 2/274.png">

## - Halaman ubah user berhasil ditampilkan.

## 15. Menambahkan Route untuk Simpan Perubahan
## Tambahkan script pada `web.php` untuk menyimpan perubahan data.
<img src="imgSS/Praktikum 2/275.png">

## 16. Menambahkan Method Simpan Perubahan di Controller
## Tambahkan method `ubah_simpan()` pada `UserController.php`.
<img src="imgSS/Praktikum 2/276.png">


## 17. Menjalankan Program dan Observasi
## Jalankan aplikasi, akses `localhost:8000/user/ubah/1`, ubah data, dan klik ubah.
<img src="imgSS/Praktikum 2/277.png">


## 18. Menambahkan Route untuk Hapus Data
## Tambahkan script pada `web.php` untuk menghapus data user.
<img src="imgSS/Praktikum 2/278.png">


## 19. Menambahkan Method Hapus di Controller
## Tambahkan method `hapus()` pada `UserController.php`.
<img src="imgSS/Praktikum 2/279.png">


## 20. Menjalankan Program dan Observasi
## Jalankan aplikasi, klik tombol hapus pada salah satu user.
<img src="imgSS/Praktikum 2/280.png">

## - Data user dengan username "dika" berhasil dihapus dari database.

# Praktikum 2.7 – Relationships

## 1. Menambahkan Relasi pada Model User

## Buka file `UserModel.php` pada folder `app/Models/` dan tambahkan script yang sesuai untuk mengatur hubungan antar model.
<img src="imgSS/Praktikum 2/a1.png">

## 2. Mengubah Method di Controller

## Buka file `UserController.php` pada folder `app/Http/Controllers/` dan ubah method yang ada sesuai dengan instruksi.
<img src="imgSS/Praktikum 2/a2.png">

## 3. Menjalankan Program dan Observasi

## Simpan perubahan dan jalankan project pada browser.
<img src="imgSS/Praktikum 2/a3.png">

## - Data user berhasil ditampilkan dengan relasi yang telah dibuat.

## 4. Mengubah Kembali Method di Controller

## Buka file `UserController.php` dan ubah kembali method yang ada sesuai dengan instruksi yang diberikan.
<img src="imgSS/Praktikum 2/a4.png">


## 5. Mengubah Tampilan pada View

## Buka file `user.blade.php` pada folder `resources/views/` dan sesuaikan scriptnya.
<img src="imgSS/Praktikum 2/a5.png">


## 6. Menjalankan Program dan Observasi

## Jalankan aplikasi dan akses kembali halaman user pada browser.
<img src="imgSS/Praktikum 2/a6.png">

## - Data user ditampilkan dengan relasi yang sesuai, menunjukkan hubungan yang telah dibuat dalam model.








