# kelas dasar (level 1 dari multilevel inheritance): atribut paling umum yang dimiliki setiap film
class Film:
    # constructor
    def __init__(self, id_film: int, judul: str, genre: str, durasi: int, harga: int):
        self.__id_film: int = 0
        self.__judul: str = ""
        self.__genre: str = ""
        self.__durasi: int = 0  # dalam menit
        self.__harga: int = 0   # harga tiket dalam rupiah
        self.setId(id_film) # inisialisasi lewat setter (tervalidasi)
        self.setJudul(judul) # inisialisasi lewat setter (tervalidasi)
        self.setGenre(genre) # inisialisasi lewat setter (tervalidasi)
        self.setDurasi(durasi) # inisialisasi lewat setter (tervalidasi)
        self.setHarga(harga) # inisialisasi lewat setter (tervalidasi)

    # getter (mengambil data)
    def getId(self) -> int:
        return self.__id_film # mengembalikan nilai

    def getJudul(self) -> str:
        return self.__judul # mengembalikan nilai

    def getGenre(self) -> str:
        return self.__genre # mengembalikan nilai

    def getDurasi(self) -> int:
        return self.__durasi # mengembalikan nilai

    def getHarga(self) -> int:
        return self.__harga # mengembalikan nilai

    # setter (untuk merubah value)
    def setId(self, id_film: int) -> None:
        self.__id_film = id_film # mengubah value id_film

    def setJudul(self, judul: str) -> None:
        self.__judul = judul # mengubah value atribut dengan value baru

    def setGenre(self, genre: str) -> None:
        self.__genre = genre # mengubah value atribut dengan value baru

    def setDurasi(self, durasi: int) -> None:
        if durasi >= 0: # durasi harus lebih dari 0 dan tidak boleh negatif
            self.__durasi = durasi # mengubah value atribut dengan value baru
        else:
            print("Durasi tidak boleh negatif.") # pesan jika angka negatif

    def setHarga(self, harga: int) -> None:
        if harga > 0: # harga harus lebih dari 0 dan tidak boleh negatif
            self.__harga = harga # mengubah value atribut dengan value baru
        else:
            print("Harga harus lebih dari 0.") # pesan jika angka negatif
