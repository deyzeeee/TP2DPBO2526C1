from Film import Film

# kelas turunan level 2 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
# menambahkan atribut yang mulai spesifik dimiliki oleh film animasi
class FilmAnimasi(Film):
    # constructor, memanggil constructor Film untuk atribut warisan
    def __init__(self, id_film: int, judul: str, genre: str, durasi: int, harga: int,
                 studio_animasi: str, rating_usia: str, frame_rate: int):
        super().__init__(id_film, judul, genre, durasi, harga)
        self.__studio_animasi: str = ""
        self.__rating_usia: str = ""  # contoh: SU, 13+, 17+
        self.__frame_rate: int = 0    # dalam fps
        self.setStudioAnimasi(studio_animasi) # inisialisasi lewat setter (tervalidasi)
        self.setRatingUsia(rating_usia) # inisialisasi lewat setter (tervalidasi)
        self.setFrameRate(frame_rate) # inisialisasi lewat setter (tervalidasi)

    # getter (mengambil data)
    def getStudioAnimasi(self) -> str:
        return self.__studio_animasi # mengembalikan nilai

    def getRatingUsia(self) -> str:
        return self.__rating_usia # mengembalikan nilai

    def getFrameRate(self) -> int:
        return self.__frame_rate # mengembalikan nilai

    # setter (untuk merubah value)
    def setStudioAnimasi(self, studio_animasi: str) -> None:
        self.__studio_animasi = studio_animasi # mengubah value atribut dengan value baru

    def setRatingUsia(self, rating_usia: str) -> None:
        self.__rating_usia = rating_usia # mengubah value atribut dengan value baru

    def setFrameRate(self, frame_rate: int) -> None:
        if frame_rate > 0: # frame rate harus lebih dari 0
            self.__frame_rate = frame_rate # mengubah value atribut dengan value baru
        else:
            print("Frame rate harus lebih dari 0.")
