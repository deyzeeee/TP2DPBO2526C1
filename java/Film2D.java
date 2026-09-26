// kelas turunan level 3 (multilevel inheritance: Film -> FilmAnimasi -> Film2D)
// menambahkan atribut yang mulai khusus dimiliki oleh film animasi 2D
// (satu-satunya class yang dibuat objeknya di Main; sudah otomatis mewarisi seluruh
// atribut Film dan FilmAnimasi, jadi 1 objek Film2D sudah mewakili data dari ketiga class)
public class Film2D extends FilmAnimasi {
    // atribut private tambahan
    private String gaya_visual; // contoh: Hand-drawn, Cel Shading, Chibi
    private int jumlah_layer;   // jumlah layer/lapisan gambar animasi
    private String resolusi;    // contoh: 1920x1080

    // Constructor, memanggil constructor FilmAnimasi untuk atribut warisan
    public Film2D(int id_film, String judul, String genre, int durasi, int harga,
                  String studio_animasi, String rating_usia, int frame_rate,
                  String gaya_visual, int jumlah_layer, String resolusi) {
        super(id_film, judul, genre, durasi, harga, studio_animasi, rating_usia, frame_rate); // inisialisasi atribut warisan
        setGayaVisual(gaya_visual); // inisialisasi
        setJumlahLayer(jumlah_layer); // inisialisasi
        setResolusi(resolusi); // inisialisasi
    }

    // Getter
    public String getGayaVisual() {
        return gaya_visual; // mengembalikan nilai atribut
    }

    public int getJumlahLayer() {
        return jumlah_layer; // mengembalikan nilai atribut
    }

    public String getResolusi() {
        return resolusi; // mengembalikan nilai atribut
    }

    // Setter
    public void setGayaVisual(String gaya_visual) {
        this.gaya_visual = gaya_visual; // menginisialisasi atribut dengan value baru
    }

    public void setJumlahLayer(int jumlah_layer) {
        if (jumlah_layer > 0) { // jumlah layer harus lebih dari 0
            this.jumlah_layer = jumlah_layer; // menginisialisasi atribut dengan value baru
        } else {
            System.out.println("Jumlah layer harus lebih dari 0.");
        }
    }

    public void setResolusi(String resolusi) {
        this.resolusi = resolusi; // menginisialisasi atribut dengan value baru
    }
}
