<?php
    // kelas dasar (level 1 dari multilevel inheritance): atribut paling umum yang dimiliki setiap film
    class Film {
        // atribut private
        private int $id_film;
        private string $judul;
        private string $genre;
        private int $durasi;    // dalam menit
        private int $harga;     // harga tiket dalam rupiah
        private string $poster; // atribut foto khusus PHP: path file gambar lokal di folder images/

        // constructor
        public function __construct(int $id_film, string $judul, string $genre, int $durasi, int $harga, string $poster)
        {
            $this->setId($id_film); // inisialisasi
            $this->setJudul($judul); // inisialisasi
            $this->setGenre($genre); // inisialisasi
            $this->setDurasi($durasi); // inisialisasi
            $this->setHarga($harga); // inisialisasi
            $this->setPoster($poster); // inisialisasi
        }

        // Getter (untuk mendapatkan nilai atribut)
        public function getId(): int
        {
            return $this->id_film; // mengembalikan nilai atribut
        }

        public function getJudul(): string
        {
            return $this->judul; // mengembalikan nilai atribut
        }

        public function getGenre(): string
        {
            return $this->genre; // mengembalikan nilai atribut
        }

        public function getDurasi(): int
        {
            return $this->durasi; // mengembalikan nilai atribut
        }

        public function getHarga(): int
        {
            return $this->harga; // mengembalikan nilai atribut
        }

        public function getPoster(): string
        {
            return $this->poster; // mengembalikan nilai atribut
        }

        // Setter (untuk mengubah nilai atribut)
        public function setId(int $id_film): void
        {
            $this->id_film = $id_film; // menginisialisasi atribut dengan value baru
        }

        public function setJudul(string $judul): void
        {
            $this->judul = $judul; // menginisialisasi atribut dengan value baru
        }

        public function setGenre(string $genre): void
        {
            $this->genre = $genre; // menginisialisasi atribut dengan value baru
        }

        public function setDurasi(int $durasi): void
        {
            // Validasi: memastikan durasi tidak negatif
            if ($durasi >= 0) {
                $this->durasi = $durasi; // menginisialisasi atribut dengan value baru
            } else {
                echo "Durasi tidak boleh negatif."; // jika input tidak valid
            }
        }

        public function setHarga(int $harga): void
        {
            // Validasi: memastikan harga lebih dari 0
            if ($harga > 0) {
                $this->harga = $harga; // menginisialisasi atribut dengan value baru
            } else {
                echo "Harga harus lebih dari 0."; // jika input tidak valid
            }
        }

        public function setPoster(string $poster): void
        {
            $this->poster = $poster; // menginisialisasi atribut dengan value baru
        }
    }
?>
