#include "Film.cpp"

// kelas turunan level 2 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
// menambahkan atribut yang mulai spesifik dimiliki oleh film animasi
class FilmAnimasi : public Film {
    // atribut private tambahan
    private:
        string studio_animasi;
        string rating_usia;   // contoh: SU, 13+, 17+
        int frame_rate;       // dalam fps

    public:
    // constructor, memanggil constructor Film untuk atribut warisan
    FilmAnimasi(int id, string judul, string genre, int durasi, int harga,
                string studio_animasi, string rating_usia, int frame_rate)
        : Film(id, judul, genre, durasi, harga) {
        setStudioAnimasi(studio_animasi); // inisialisasi
        setRatingUsia(rating_usia); // inisialisasi
        setFrameRate(frame_rate); // inisialisasi
    }

    // setter
    void setStudioAnimasi(const string& studio_animasi) {
        this->studio_animasi = studio_animasi; // inisialisasi
    }
    void setRatingUsia(const string& rating_usia) {
        this->rating_usia = rating_usia; // inisialisasi
    }
    void setFrameRate(const int& frame_rate) {
        if (frame_rate > 0) {
            this->frame_rate = frame_rate; // inisialisasi
        } else {
            cout << "Frame rate harus lebih dari 0." << endl;
        }
    }

    // getter
    string getStudioAnimasi() const {
        return studio_animasi; // mengambil value
    }
    string getRatingUsia() const {
        return rating_usia; // mengambil value
    }
    int getFrameRate() const {
        return frame_rate; // mengambil value
    }
};
