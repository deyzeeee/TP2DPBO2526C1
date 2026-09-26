// kelas turunan level 2 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
// menambahkan atribut yang mulai spesifik dimiliki oleh film animasi
public class FilmAnimasi extends Film {
    // atribut private tambahan
    private String studio_animasi;
    private String rating_usia; // contoh: SU, 13+, 17+
    private int frame_rate;     // dalam fps

    // Constructor, memanggil constructor Film untuk atribut warisan
    public FilmAnimasi(int id_film, String judul, String genre, int durasi, int harga,
                        String studio_animasi, String rating_usia, int frame_rate) {
        super(id_film, judul, genre, durasi, harga); // inisialisasi atribut warisan
        setStudioAnimasi(studio_animasi); // inisialisasi
        setRatingUsia(rating_usia); // inisialisasi
        setFrameRate(frame_rate); // inisialisasi
    }

    // Getter
    public String getStudioAnimasi() {
        return studio_animasi; // mengembalikan nilai atribut
    }

    public String getRatingUsia() {
        return rating_usia; // mengembalikan nilai atribut
    }

    public int getFrameRate() {
        return frame_rate; // mengembalikan nilai atribut
    }

    // Setter
    public void setStudioAnimasi(String studio_animasi) {
        this.studio_animasi = studio_animasi; // menginisialisasi atribut dengan value baru
    }

    public void setRatingUsia(String rating_usia) {
        this.rating_usia = rating_usia; // menginisialisasi atribut dengan value baru
    }

    public void setFrameRate(int frame_rate) {
        if (frame_rate > 0) { // frame rate harus lebih dari 0
            this.frame_rate = frame_rate; // menginisialisasi atribut dengan value baru
        } else {
            System.out.println("Frame rate harus lebih dari 0.");
        }
    }
}
