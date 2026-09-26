#include "Film2D.cpp"
#include <iostream>
#include <vector>
#include <iomanip>

using namespace std;

// daftar film: hanya menyimpan objek Film2D karena sudah mewarisi seluruh
// atribut Film dan FilmAnimasi (1 objek = data lengkap dari ketiga class)
vector<Film2D> daftarFilm;

// Fungsi untuk memeriksa apakah ID sudah ada
bool isIdExists(int id_film) {
    bool ada = false; // flag
    int i = 0; // index
    while (i < (int)daftarFilm.size() && !ada) { // looping, berhenti jika sudah ketemu
        if (daftarFilm[i].getId() == id_film) {
            ada = true;
        }
        i++;
    }
    return ada;
}

// Fungsi mencari lebar kolom terpanjang untuk atribut tertentu (dipakai tabel dinamis)
int maxLength(const vector<Film2D>& list, const string& kolom) {
    int maks = (int)kolom.size(); // default: panjang nama kolom itu sendiri
    for (size_t i = 0; i < list.size(); i++) { // looping ke semua elemen
        string val;
        if (kolom == "ID") val = to_string(list[i].getId());
        else if (kolom == "Judul") val = list[i].getJudul();
        else if (kolom == "Genre") val = list[i].getGenre();
        else if (kolom == "Durasi") val = to_string(list[i].getDurasi()) + " mnt";
        else if (kolom == "Harga") val = "Rp" + to_string(list[i].getHarga());
        else if (kolom == "Studio Animasi") val = list[i].getStudioAnimasi();
        else if (kolom == "Rating Usia") val = list[i].getRatingUsia();
        else if (kolom == "Frame Rate") val = to_string(list[i].getFrameRate()) + "fps";
        else if (kolom == "Gaya Visual") val = list[i].getGayaVisual();
        else if (kolom == "Jumlah Layer") val = to_string(list[i].getJumlahLayer()) + "L";
        else if (kolom == "Resolusi") val = list[i].getResolusi();
        
        if ((int)val.size() > maks) {
            maks = (int)val.size();
        }
    }
    return maks;
}

// prosedur untuk menampilkan tabel dinamis (lebar kolom menyesuaikan isi terpanjang)
void tampilkanTabel() {
    if (daftarFilm.empty()) {
        cout << "\nBelum ada data film.\n";
        return;
    }

    vector<string> kolom = {"ID", "Judul", "Genre", "Durasi", "Harga",
                             "Studio Animasi", "Rating Usia", "Frame Rate",
                             "Gaya Visual", "Jumlah Layer", "Resolusi"};
    vector<int> lebar(kolom.size());
    for (size_t k = 0; k < kolom.size(); k++) {
        lebar[k] = maxLength(daftarFilm, kolom[k]) + 2;
    }

    auto cetakGaris = [&]() {
        for (size_t k = 0; k < kolom.size(); k++) cout << "+" << string(lebar[k], '-');
        cout << "+\n";
    };

    cout << "\n=== DAFTAR FILM DI HOLO CINEMA ===\n";
    cetakGaris();
    for (size_t k = 0; k < kolom.size(); k++) cout << "|" << left << setw(lebar[k]) << (" " + kolom[k]);
    cout << "|\n";
    cetakGaris();

    for (size_t i = 0; i < daftarFilm.size(); i++) {
        Film2D& f = daftarFilm[i];
        vector<string> nilai = {
            to_string(f.getId()), f.getJudul(), f.getGenre(),
            to_string(f.getDurasi()) + " mnt", "Rp" + to_string(f.getHarga()),
            f.getStudioAnimasi(), f.getRatingUsia(), to_string(f.getFrameRate()) + "fps",
            f.getGayaVisual(), to_string(f.getJumlahLayer()) + "L", f.getResolusi()
        };
        for (size_t k = 0; k < nilai.size(); k++) cout << "|" << left << setw(lebar[k]) << (" " + nilai[k]);
        cout << "|\n";
    }
    cetakGaris();
}

// prosedur menambah 1 film baru (Add Saja, langsung Film2D lengkap: atribut Film + FilmAnimasi + Film2D)
void tambahData() {
    string inputStr;

    int id_film = 0;
    bool idValid = false; // flag validasi ID
    while (!idValid) {
        try {
            cout << "\nID Film: ";
            getline(cin, inputStr);
            id_film = stoi(inputStr);
            if (!isIdExists(id_film)) {
                idValid = true;
            } else {
                cout << "ID ini sudah ada. Silakan masukkan ID lain.\n";
            }
        } catch (const invalid_argument&) {
            cout << "Input tidak valid. Masukkan angka.\n";
        }
    }

    string judul, genre;
    cout << "Judul Film: ";
    getline(cin, judul);
    cout << "Genre Film: ";
    getline(cin, genre);

    int durasi = 0;
    bool durasiValid = false; // flag validasi durasi
    while (!durasiValid) {
        try {
            cout << "Durasi (menit): ";
            getline(cin, inputStr);
            durasi = stoi(inputStr);
            if (durasi < 0) {
                cout << "Input tidak valid. Durasi tidak boleh negatif.\n";
            } else {
                durasiValid = true;
            }
        } catch (const invalid_argument&) {
            cout << "Input tidak valid. Masukkan angka.\n";
        }
    }

    int harga = 0;
    bool hargaValid = false; // flag validasi harga
    while (!hargaValid) {
        try {
            cout << "Harga Tiket (Rp): ";
            getline(cin, inputStr);
            harga = stoi(inputStr);
            if (harga <= 0) {
                cout << "Input tidak valid. Harga harus lebih dari 0.\n";
            } else {
                hargaValid = true;
            }
        } catch (const invalid_argument&) {
            cout << "Input tidak valid. Masukkan angka.\n";
        }
    }

    string studio_animasi;
    cout << "Studio Animasi: ";
    getline(cin, studio_animasi);

    string rating_usia;
    cout << "Rating Usia (contoh: SU, 13+, 17+): ";
    getline(cin, rating_usia);

    int frame_rate = 0;
    bool frameRateValid = false; // flag validasi frame rate
    while (!frameRateValid) {
        try {
            cout << "Frame Rate (fps): ";
            getline(cin, inputStr);
            frame_rate = stoi(inputStr);
            if (frame_rate <= 0) {
                cout << "Input tidak valid. Frame rate harus lebih dari 0.\n";
            } else {
                frameRateValid = true;
            }
        } catch (const invalid_argument&) {
            cout << "Input tidak valid. Masukkan angka.\n";
        }
    }

    string gaya_visual;
    cout << "Gaya Visual (contoh: Hand-drawn, Cel Shading, Chibi): ";
    getline(cin, gaya_visual);

    int jumlah_layer = 0;
    bool layerValid = false; // flag validasi jumlah layer
    while (!layerValid) {
        try {
            cout << "Jumlah Layer Animasi: ";
            getline(cin, inputStr);
            jumlah_layer = stoi(inputStr);
            if (jumlah_layer <= 0) {
                cout << "Input tidak valid. Jumlah layer harus lebih dari 0.\n";
            } else {
                layerValid = true;
            }
        } catch (const invalid_argument&) {
            cout << "Input tidak valid. Masukkan angka.\n";
        }
    }

    string resolusi;
    cout << "Resolusi (contoh: 1920x1080): ";
    getline(cin, resolusi);

    daftarFilm.push_back(Film2D(id_film, judul, genre, durasi, harga,
                                 studio_animasi, rating_usia, frame_rate,
                                 gaya_visual, jumlah_layer, resolusi));
    cout << "\nFilm berhasil ditambahkan!\n";
}

int main() {
    // 5 data awal (wajib ada sebelum ada input user)
    daftarFilm.push_back(Film2D(101, "Senja di Negeri Angin", "Slice of Life", 92, 38000, "Studio Awan", "SU", 24, "Hand-drawn Klasik", 12, "1920x1080"));
    daftarFilm.push_back(Film2D(102, "Petualangan Rimba", "Petualangan", 96, 40000, "Kagaya Studio", "SU", 24, "Cel Shading", 10, "1920x1080"));
    daftarFilm.push_back(Film2D(103, "Legenda Naga Emas", "Fantasi", 110, 42000, "Rantau Animation", "13+", 30, "Flat Design", 14, "2560x1440"));
    daftarFilm.push_back(Film2D(104, "Kisah Daun Jatuh", "Drama", 88, 35000, "Kertas Animasi", "SU", 24, "Cat Air Digital", 10, "1280x720"));
    daftarFilm.push_back(Film2D(105, "Roda Waktu", "Fantasi", 95, 40000, "Wonder Studio", "13+", 30, "Chibi", 8, "1920x1080"));

    string pilihan = "";
    while (pilihan != "3") { // berhenti jika user memilih 3 (Keluar)
        cout << "\n=== MENU HOLO CINEMA (TP2) ===\n";
        cout << "1. Tampilkan Daftar Film\n";
        cout << "2. Tambah Film Baru\n";
        cout << "3. Keluar\n";
        cout << "Pilih menu: ";
        getline(cin, pilihan);

        if (pilihan == "1") {
            tampilkanTabel();
        } else if (pilihan == "2") {
            tambahData();
        } else if (pilihan == "3") {
            cout << "\nTerima kasih sudah menggunakan sistem Holo Cinema!\n";
        } else {
            cout << "Pilihan tidak valid. Coba lagi\n";
        }
    }
    return 0;
}