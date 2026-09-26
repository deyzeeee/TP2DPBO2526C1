# JANJI
Saya Muhammad Fadey Rafif dengan NIM 2504792 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# STRUKTUR FILE

```
TP2DPBO2526C1/
├── cpp/
│   ├── Film.cpp
│   ├── FilmAnimasi.cpp
│   ├── Film2D.cpp
│   ├── Main.cpp
│   └── testcase.txt
│
├── java/
│   ├── Film.java
│   ├── FilmAnimasi.java
│   ├── Film2D.java
│   ├── Main.java
│   └── testcase.txt
│
├── python/
│   ├── Film.py
│   ├── FilmAnimasi.py
│   ├── Film2D.py
│   ├── Main.py
│   └── testcase.txt
│
├── php/
│   ├── Film.php
│   ├── FilmAnimasi.php
│   ├── Film2D.php
│   ├── Main.php
│   ├── testcase.txt
│   └── images/
│       └── *.jpg (poster hasil upload, otomatis dibuat)
│
├── Dokumentasi/
│   └── (screenshot/screen record tiap bahasa)
│
└── Readme.md
```

# 🎬 TEMA PROGRAM
Pengembangan dari tema TP1 "Manajemen Bioskop Holo Cinema", sekarang memakai konsep *OOP Multilevel Inheritance* pada kasus film animasi.

Terdapat 3 class:
1. *Film*, memiliki atribut paling umum yang dimiliki semua jenis film.
2. *FilmAnimasi*, turunan class Film, menambahkan atribut yang mulai spesifik dimiliki produksi film animasi.
3. *Film2D*, turunan class FilmAnimasi, menambahkan atribut yang mulai khusus dimiliki animasi bergaya 2D.

Dalam repo ini terdapat 4 bahasa: *C++, Java, Python, dan PHP*.

Ketentuan:
- Memiliki 5 data awal (default) sebelum ada input user.
- Menerima input user (Add saja, sesuai ketentuan TP2 — tidak ada update/hapus/cari).
- Menampilkan data class terakhir/level paling bawah (**Film2D**) dalam satu tabel dinamis — karena Film2D sudah otomatis mewarisi seluruh atribut Film dan FilmAnimasi, 1 baris tabel = data lengkap dari ketiga class sekaligus.
- Pada PHP ditambahkan atribut `poster` (gambar), khusus di versi PHP saja.

# ❌ Error Handling
Dalam semua program terdapat error handling untuk input yang tidak valid: input non-numeric pada field angka (ID, durasi, harga, frame rate, jumlah layer), angka negatif/nol pada field yang mensyaratkan nilai positif, serta ID yang sudah dipakai film lain. Program akan terus meminta input sampai valid (CLI) atau menampilkan pesan error dan tidak menyimpan data (PHP). Semua validasi pada CLI (C++/Java/Python) memakai pola `while` + flag boolean, bukan `for`/`while(true)` dengan `break`/`continue`.

# Diagram Konsep

<img src="Dokumentasi/desain_diagram_TP2.drawio" alt="desain diagram"><br>

### Alasan pemilihan class
1. *Film*: class paling umum, dimiliki semua jenis film (live action maupun animasi). Atribut di sini sengaja dibuat sesedikit mungkin (id, judul, genre, durasi, harga) supaya benar-benar generik.
2. *FilmAnimasi*: kategori yang lebih khusus dari Film ibarat "jenis" dari Film yang menambahkan konteks produksi animasi (studio, rating usia, frame rate).
3. *Film2D*: turunan dari FilmAnimasi, mewakili animasi bergaya 2D secara spesifik (gaya visual, jumlah layer, resolusi).

# ☕️ Class & Atribut
1. Film
    - id_film : int
    - judul : string
    - genre : string
    - durasi : int (menit)
    - harga : int (rupiah)
    - poster : string (khusus PHP, path gambar lokal)

2. FilmAnimasi (extends Film)
    - studio_animasi : string
    - rating_usia : string
    - frame_rate : int (fps)

3. Film2D (extends FilmAnimasi)
    - gaya_visual : string
    - jumlah_layer : int
    - resolusi : string

# 🍎 Alur Program
1. Program memuat 5 data awal (semuanya objek `Film2D`).
2. User dapat memilih opsi untuk menampilkan data atau menambah data.
3. Semua data ditampilkan dalam satu tabel dinamis (lebar kolom menyesuaikan isi terpanjang).
4. Saat menambah data, user mengisi seluruh atribut Film → FilmAnimasi → Film2D secara berurutan dalam satu alur (ID dicek harus unik; durasi, harga, frame rate, dan jumlah layer divalidasi harus angka positif/tidak negatif).
5. Pada PHP, poster wajib diunggah saat menambah data.
6. Khusus PHP, tombol **Reset Data** mengembalikan data ke 5 data awal saja.

# DOKUMENTASI OUTPUT
> Bagian ini tinggal diisi screenshot/screen record kamu sendiri (taruh filenya di folder `Dokumentasi/`, lalu sesuaikan path `<img>` di bawah).

## Output program C++
### Tampilan 5 data awal & tabel dinamis
<img src="Dokumentasi/cpp/tampil-data-cpp.png" alt="tampil data cpp">
<br>

### Tambah data beserta error handling input
<img src="Dokumentasi/cpp/tambah-data-dan-error-handling-cpp.png" alt="tambah data dan error handling cpp">
<br>

## Output program Java
### Tampilan 5 data awal & tabel dinamis
<img src="Dokumentasi/java/tampil-data-java.png" alt="tampil data java">
<br>

### Tambah data beserta error handling input 
<img src="Dokumentasi/java/tambah-data-dan-error-handling-java-1.png" alt="tambah data dan error handling java">
<br>
<img src="Dokumentasi/java/tambah-data-dan-error-handling-java-2.png" alt="tambah data dan error handling java">
<br>

## Output program Python
### Tampilan 5 data awal & tabel dinamis
<img src="Dokumentasi/python/tampil-data-py.png" alt="tampil data py">
<br>

### Tambah data beserta error handling input
<img src="Dokumentasi/python/tambah-data-dan-error-handling-py.png" alt="tambah data dan error handling py">
<br>

## Output program PHP
### Tampilan awal (5 data awal dalam tabel dinamis)
<img src="Dokumentasi/php/tampilan-awal-php.png" alt="tampilan awal php">
<br>

### Tambah Film (beserta upload poster)
<img src="Dokumentasi/php/tambah-film-php.png" alt="tambah film php">
<br>

### Error handling (ID double / input tidak valid / poster kosong)
<img src="Dokumentasi/php/error-handling-php.png" alt="error handling php">
<br>

### Reset Data
<img src="Dokumentasi/php/reset-data-php.png" alt="reset data php">
<br>
