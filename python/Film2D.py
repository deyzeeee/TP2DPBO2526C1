from FilmAnimasi import FilmAnimasi

# kelas turunan level 3 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
# menambahkan atribut yang mulai khusus dimiliki oleh film animasi 2D
# (satu-satunya class yang dibuat objeknya di Main; sudah otomatis mewarisi seluruh
# atribut Film dan FilmAnimasi, jadi 1 objek Film2D sudah mewakili data dari ketiga class)
class Film2D(FilmAnimasi):
    # constructor, memanggil constructor FilmAnimasi untuk atribut warisan
    def __init__(self, id_film: int, judul: str, genre: str, durasi: int, harga: int,
                 studio_animasi: str, rating_usia: str, frame_rate: int,
                 gaya_visual: str, jumlah_layer: int, resolusi: str):
        super().__init__(id_film, judul, genre, durasi, harga, studio_animasi, rating_usia, frame_rate)
        self.__gaya_visual: str = ""  # contoh: Hand-drawn, Cel Shading, Chibi
        self.__jumlah_layer: int = 0  # jumlah layer/lapisan gambar animasi
        self.__resolusi: str = ""     # contoh: 1920x1080
        self.setGayaVisual(gaya_visual) # inisialisasi lewat setter (tervalidasi)
        self.setJumlahLayer(jumlah_layer) # inisialisasi lewat setter (tervalidasi)
        self.setResolusi(resolusi) # inisialisasi lewat setter (tervalidasi)

    # getter (mengambil data)
    def getGayaVisual(self) -> str:
        return self.__gaya_visual # mengembalikan nilai

    def getJumlahLayer(self) -> int:
        return self.__jumlah_layer # mengembalikan nilai

    def getResolusi(self) -> str:
        return self.__resolusi # mengembalikan nilai

    # setter (untuk merubah value)
    def setGayaVisual(self, gaya_visual: str) -> None:
        self.__gaya_visual = gaya_visual # mengubah value atribut dengan value baru

    def setJumlahLayer(self, jumlah_layer: int) -> None:
        if jumlah_layer > 0: # jumlah layer harus lebih dari 0
            self.__jumlah_layer = jumlah_layer # mengubah value atribut dengan value baru
        else:
            print("Jumlah layer harus lebih dari 0.")

    def setResolusi(self, resolusi: str) -> None:
        self.__resolusi = resolusi # mengubah value atribut dengan value baru
