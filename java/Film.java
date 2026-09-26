// kelas dasar (level 1 dari multilevel inheritance): atribut paling umum yang dimiliki setiap film
public class Film {
    // atribut private
    private int id_film;
    private String judul;
    private String genre;
    private int durasi;  // dalam menit
    private int harga;   // harga tiket dalam rupiah

    // Constructor
    public Film(int id_film_baru, String judul_baru, String genre_baru, int durasi_baru, int harga_baru) {
        setId(id_film_baru); // inisialisasi
        setJudul(judul_baru); // inisialisasi
        setGenre(genre_baru); // inisialisasi
        setDurasi(durasi_baru); // inisialisasi
        setHarga(harga_baru); // inisialisasi
    }

    // Getter
    public int getId() {
        return id_film; // mengembalikan nilai atribut
    }

    public String getJudul() {
        return judul; // mengembalikan nilai atribut
    }

    public String getGenre() {
        return genre; // mengembalikan nilai atribut
    }

    public int getDurasi() {
        return durasi; // mengembalikan nilai atribut
    }

    public int getHarga() {
        return harga; // mengembalikan nilai atribut
    }

    // Setter
    public void setId(int id_film) {
        this.id_film = id_film; // menginisialisasi atribut dengan value baru
    }

    public void setJudul(String judul) {
        this.judul = judul; // menginisialisasi atribut dengan value baru
    }

    public void setGenre(String genre) {
        this.genre = genre; // menginisialisasi atribut dengan value baru
    }

    public void setDurasi(int durasi) {
        if (durasi >= 0) { // durasi harus lebih dari atau sama dengan 0
            this.durasi = durasi; // menginisialisasi atribut dengan value baru
        } else {
            System.out.println("Durasi tidak boleh negatif.");
        }
    }

    public void setHarga(int harga) {
        if (harga > 0) { // harga harus lebih dari 0
            this.harga = harga; // menginisialisasi atribut dengan value baru
        } else {
            System.out.println("Harga harus lebih dari 0.");
        }
    }
}
