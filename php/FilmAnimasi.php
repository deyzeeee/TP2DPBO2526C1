<?php
    require_once 'Film.php';

    // kelas turunan level 2 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
    // menambahkan atribut yang mulai spesifik dimiliki oleh film animasi
    class FilmAnimasi extends Film {
        // atribut private tambahan
        private string $studio_animasi;
        private string $rating_usia; // contoh: SU, 13+, 17+
        private int $frame_rate;     // dalam fps

        // constructor, memanggil constructor Film untuk atribut warisan (termasuk poster)
        public function __construct(int $id_film, string $judul, string $genre, int $durasi, int $harga, string $poster,
                                     string $studio_animasi, string $rating_usia, int $frame_rate)
        {
            parent::__construct($id_film, $judul, $genre, $durasi, $harga, $poster); // inisialisasi atribut warisan
            $this->setStudioAnimasi($studio_animasi); // inisialisasi
            $this->setRatingUsia($rating_usia); // inisialisasi
            $this->setFrameRate($frame_rate); // inisialisasi
        }

        // Getter
        public function getStudioAnimasi(): string
        {
            return $this->studio_animasi; // mengembalikan nilai atribut
        }

        public function getRatingUsia(): string
        {
            return $this->rating_usia; // mengembalikan nilai atribut
        }

        public function getFrameRate(): int
        {
            return $this->frame_rate; // mengembalikan nilai atribut
        }

        // Setter
        public function setStudioAnimasi(string $studio_animasi): void
        {
            $this->studio_animasi = $studio_animasi; // menginisialisasi atribut dengan value baru
        }

        public function setRatingUsia(string $rating_usia): void
        {
            $this->rating_usia = $rating_usia; // menginisialisasi atribut dengan value baru
        }

        public function setFrameRate(int $frame_rate): void
        {
            // Validasi: memastikan frame rate lebih dari 0
            if ($frame_rate > 0) {
                $this->frame_rate = $frame_rate; // menginisialisasi atribut dengan value baru
            } else {
                echo "Frame rate harus lebih dari 0."; // jika input tidak valid
            }
        }
    }
?>
