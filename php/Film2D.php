<?php
    require_once 'FilmAnimasi.php';

    // kelas turunan level 3 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
    // menambahkan atribut yang mulai khusus dimiliki oleh film animasi 2D
    // (satu-satunya class yang dibuat objeknya di Main; sudah otomatis mewarisi seluruh
    // atribut Film dan FilmAnimasi, jadi 1 objek Film2D sudah mewakili data dari ketiga class)
    class Film2D extends FilmAnimasi {
        // atribut private tambahan
        private string $gaya_visual; // contoh: Hand-drawn, Cel Shading, Chibi
        private int $jumlah_layer;   // jumlah layer/lapisan gambar animasi
        private string $resolusi;    // contoh: 1920x1080

        // constructor, memanggil constructor FilmAnimasi untuk atribut warisan
        public function __construct(int $id_film, string $judul, string $genre, int $durasi, int $harga, string $poster,
                                     string $studio_animasi, string $rating_usia, int $frame_rate,
                                     string $gaya_visual, int $jumlah_layer, string $resolusi)
        {
            parent::__construct($id_film, $judul, $genre, $durasi, $harga, $poster,
                                 $studio_animasi, $rating_usia, $frame_rate); // inisialisasi atribut warisan
            $this->setGayaVisual($gaya_visual); // inisialisasi
            $this->setJumlahLayer($jumlah_layer); // inisialisasi
            $this->setResolusi($resolusi); // inisialisasi
        }

        // Getter
        public function getGayaVisual(): string
        {
            return $this->gaya_visual; // mengembalikan nilai atribut
        }

        public function getJumlahLayer(): int
        {
            return $this->jumlah_layer; // mengembalikan nilai atribut
        }

        public function getResolusi(): string
        {
            return $this->resolusi; // mengembalikan nilai atribut
        }

        // Setter
        public function setGayaVisual(string $gaya_visual): void
        {
            $this->gaya_visual = $gaya_visual; // menginisialisasi atribut dengan value baru
        }

        public function setJumlahLayer(int $jumlah_layer): void
        {
            // Validasi: memastikan jumlah layer lebih dari 0
            if ($jumlah_layer > 0) {
                $this->jumlah_layer = $jumlah_layer; // menginisialisasi atribut dengan value baru
            } else {
                echo "Jumlah layer harus lebih dari 0."; // jika input tidak valid
            }
        }

        public function setResolusi(string $resolusi): void
        {
            $this->resolusi = $resolusi; // menginisialisasi atribut dengan value baru
        }
    }
?>
