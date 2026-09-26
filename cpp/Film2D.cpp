#include "FilmAnimasi.cpp"

// kelas turunan level 3 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
// menambahkan atribut yang mulai khusus dimiliki oleh film animasi 2D
// (satu-satunya class yang dibuat objeknya di Main; sudah otomatis mewarisi seluruh
// atribut Film dan FilmAnimasi, jadi 1 objek Film2D sudah mewakili data dari ketiga class)
class Film2D : public FilmAnimasi {
    // atribut private tambahan
    private:
        string gaya_visual;   // contoh: Hand-drawn, Cel Shading, Chibi
        int jumlah_layer;     // jumlah layer/lapisan gambar animasi
        string resolusi;      // contoh: 1920x1080

    public:
    // constructor, memanggil constructor FilmAnimasi untuk atribut warisan
    Film2D(int id, string judul, string genre, int durasi, int harga,
           string studio_animasi, string rating_usia, int frame_rate,
           string gaya_visual, int jumlah_layer, string resolusi)
        : FilmAnimasi(id, judul, genre, durasi, harga, studio_animasi, rating_usia, frame_rate) {
        setGayaVisual(gaya_visual); // inisialisasi
        setJumlahLayer(jumlah_layer); // inisialisasi
        setResolusi(resolusi); // inisialisasi
    }

    // setter
    void setGayaVisual(const string& gaya_visual) {
        this->gaya_visual = gaya_visual; // inisialisasi
    }
    void setJumlahLayer(const int& jumlah_layer) {
        if (jumlah_layer > 0) {
            this->jumlah_layer = jumlah_layer; // inisialisasi
        } else {
            cout << "Jumlah layer harus lebih dari 0." << endl;
        }
    }
    void setResolusi(const string& resolusi) {
        this->resolusi = resolusi; // inisialisasi
    }

    // getter
    string getGayaVisual() const {
        return gaya_visual; // mengambil value
    }
    int getJumlahLayer() const {
        return jumlah_layer; // mengambil value
    }
    string getResolusi() const {
        return resolusi; // mengambil value
    }
};
