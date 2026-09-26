from typing import List
from Film2D import Film2D

# daftar film: hanya menyimpan objek Film2D karena sudah mewarisi seluruh
# atribut Film dan FilmAnimasi (1 objek = data lengkap dari ketiga class)
daftarFilm: List[Film2D] = []

# fungsi untuk memeriksa apakah ID sudah ada
def isIdExists(id_film: int) -> bool:
    ada = False # flag
    i = 0 # index
    while i < len(daftarFilm) and not ada: # looping, berhenti jika sudah ketemu
        if daftarFilm[i].getId() == id_film:
            ada = True
        i += 1
    return ada

# fungsi mencari lebar kolom terpanjang untuk atribut tertentu (dipakai tabel dinamis)
def maxLength(kolom: str) -> int:
    maks = len(kolom) # default: panjang nama kolom itu sendiri
    for f in daftarFilm: # looping ke semua elemen
        if kolom == "ID":
            val = str(f.getId())
        elif kolom == "Judul":
            val = f.getJudul()
        elif kolom == "Genre":
            val = f.getGenre()
        elif kolom == "Durasi":
            val = f"{f.getDurasi()} mnt"
        elif kolom == "Harga":
            val = f"Rp{f.getHarga()}"
        elif kolom == "Studio Animasi":
            val = f.getStudioAnimasi()
        elif kolom == "Rating Usia":
            val = f.getRatingUsia()
        elif kolom == "Frame Rate":
            val = f"{f.getFrameRate()}fps"
        elif kolom == "Gaya Visual":
            val = f.getGayaVisual()
        elif kolom == "Jumlah Layer":
            val = f"{f.getJumlahLayer()}L"
        elif kolom == "Resolusi":
            val = f.getResolusi()
        else:
            val = ""
        maks = max(maks, len(val))
    return maks

# prosedur untuk menampilkan tabel dinamis (lebar kolom menyesuaikan isi terpanjang)
def tampilkanTabel() -> None:
    if not daftarFilm:
        print("\nBelum ada data film.")
        return

    kolom = ["ID", "Judul", "Genre", "Durasi", "Harga",
             "Studio Animasi", "Rating Usia", "Frame Rate",
             "Gaya Visual", "Jumlah Layer", "Resolusi"]
    lebar = [maxLength(k) + 2 for k in kolom]

    def cetakGaris():
        print("".join("+" + "-" * w for w in lebar) + "+")

    print("\n=== DAFTAR FILM DI HOLO CINEMA ===")
    cetakGaris()
    print("".join("|" + (" " + kolom[k]).ljust(lebar[k]) for k in range(len(kolom))) + "|")
    cetakGaris()

    for f in daftarFilm:
        nilai = [
            str(f.getId()), f.getJudul(), f.getGenre(),
            f"{f.getDurasi()} mnt", f"Rp{f.getHarga()}",
            f.getStudioAnimasi(), f.getRatingUsia(), f"{f.getFrameRate()}fps",
            f.getGayaVisual(), f"{f.getJumlahLayer()}L", f.getResolusi()
        ]
        print("".join("|" + (" " + nilai[k]).ljust(lebar[k]) for k in range(len(nilai))) + "|")
    cetakGaris()

# prosedur menambah 1 film baru (Add Saja, langsung Film2D lengkap: atribut Film + FilmAnimasi + Film2D)
def tambahData() -> None:
    id_film = 0
    id_valid = False # flag validasi ID
    while not id_valid:
        try:
            id_film = int(input("\nID Film: "))
            if not isIdExists(id_film):
                id_valid = True
            else:
                print("ID ini sudah ada. Silakan masukkan ID lain.")
        except ValueError:
            print("Input tidak valid. Masukkan angka.")

    judul = input("Judul Film: ")
    genre = input("Genre Film: ")

    durasi = 0
    durasi_valid = False # flag validasi durasi
    while not durasi_valid:
        try:
            durasi = int(input("Durasi (menit): "))
            if durasi < 0:
                print("Input tidak valid. Durasi tidak boleh negatif.")
            else:
                durasi_valid = True
        except ValueError:
            print("Input tidak valid. Masukkan angka.")

    harga = 0
    harga_valid = False # flag validasi harga
    while not harga_valid:
        try:
            harga = int(input("Harga Tiket (Rp): "))
            if harga <= 0:
                print("Input tidak valid. Harga harus lebih dari 0.")
            else:
                harga_valid = True
        except ValueError:
            print("Input tidak valid. Masukkan angka.")

    studio_animasi = input("Studio Animasi: ")
    rating_usia = input("Rating Usia (contoh: SU, 13+, 17+): ")

    frame_rate = 0
    frame_rate_valid = False # flag validasi frame rate
    while not frame_rate_valid:
        try:
            frame_rate = int(input("Frame Rate (fps): "))
            if frame_rate <= 0:
                print("Input tidak valid. Frame rate harus lebih dari 0.")
            else:
                frame_rate_valid = True
        except ValueError:
            print("Input tidak valid. Masukkan angka.")

    gaya_visual = input("Gaya Visual (contoh: Hand-drawn, Cel Shading, Chibi): ")

    jumlah_layer = 0
    layer_valid = False # flag validasi jumlah layer
    while not layer_valid:
        try:
            jumlah_layer = int(input("Jumlah Layer Animasi: "))
            if jumlah_layer <= 0:
                print("Input tidak valid. Jumlah layer harus lebih dari 0.")
            else:
                layer_valid = True
        except ValueError:
            print("Input tidak valid. Masukkan angka.")

    resolusi = input("Resolusi (contoh: 1920x1080): ")

    daftarFilm.append(Film2D(id_film, judul, genre, durasi, harga,
                              studio_animasi, rating_usia, frame_rate,
                              gaya_visual, jumlah_layer, resolusi))
    print("\nFilm berhasil ditambahkan!")

# main program
def main() -> None:
    # 5 data awal (wajib ada sebelum ada input user)
    daftarFilm.append(Film2D(101, "Senja di Negeri Angin", "Slice of Life", 92, 38000, "Studio Awan", "SU", 24, "Hand-drawn Klasik", 12, "1920x1080"))
    daftarFilm.append(Film2D(102, "Petualangan Rimba", "Petualangan", 96, 40000, "Kagaya Studio", "SU", 24, "Cel Shading", 10, "1920x1080"))
    daftarFilm.append(Film2D(103, "Legenda Naga Emas", "Fantasi", 110, 42000, "Rantau Animation", "13+", 30, "Flat Design", 14, "2560x1440"))
    daftarFilm.append(Film2D(104, "Kisah Daun Jatuh", "Drama", 88, 35000, "Kertas Animasi", "SU", 24, "Cat Air Digital", 10, "1280x720"))
    daftarFilm.append(Film2D(105, "Roda Waktu", "Fantasi", 95, 40000, "Wonder Studio", "13+", 30, "Chibi", 8, "1920x1080"))

    pilihan = ""
    while pilihan != '3': # berhenti jika user memilih 3 (Keluar)
        print("\n=== MENU HOLO CINEMA (TP2) ===")
        print("1. Tampilkan Daftar Film")
        print("2. Tambah Film Baru")
        print("3. Keluar")
        pilihan = input("Pilih menu: ")

        if pilihan == '1':
            tampilkanTabel()
        elif pilihan == '2':
            tambahData()
        elif pilihan == '3':
            print("\nTerima kasih sudah menggunakan sistem Holo Cinema!")
        else:
            print("Pilihan tidak valid. Coba lagi")

if __name__ == "__main__":
    main()
