import java.util.Scanner;
import java.util.ArrayList;

public class Main {
    // daftar film: hanya menyimpan objek Film2D karena sudah mewarisi seluruh
    // atribut Film dan FilmAnimasi (1 objek = data lengkap dari ketiga class)
    private static ArrayList<Film2D> daftarFilm = new ArrayList<>();
    private static Scanner scanner = new Scanner(System.in);

    // fungsi untuk memeriksa apakah ID sudah ada
    private static boolean isIdExists(int id_film) {
        boolean ada = false; // flag
        int i = 0; // index
        while (i < daftarFilm.size() && !ada) { // looping, berhenti jika sudah ketemu
            if (daftarFilm.get(i).getId() == id_film) {
                ada = true;
            }
            i++;
        }
        return ada;
    }

    // fungsi mencari lebar kolom terpanjang untuk atribut tertentu (dipakai tabel dinamis)
    private static int maxLength(String kolom) {
        int maks = kolom.length(); // default: panjang nama kolom itu sendiri
        for (Film2D f : daftarFilm) { // looping ke semua elemen
            String val;
            switch (kolom) {
                case "ID": val = String.valueOf(f.getId()); break;
                case "Judul": val = f.getJudul(); break;
                case "Genre": val = f.getGenre(); break;
                case "Durasi": val = f.getDurasi() + " mnt"; break;
                case "Harga": val = "Rp" + f.getHarga(); break;
                case "Studio Animasi": val = f.getStudioAnimasi(); break;
                case "Rating Usia": val = f.getRatingUsia(); break;
                case "Frame Rate": val = f.getFrameRate() + "fps"; break;
                case "Gaya Visual": val = f.getGayaVisual(); break;
                case "Jumlah Layer": val = f.getJumlahLayer() + "L"; break;
                case "Resolusi": val = f.getResolusi(); break;
                default: val = "";
            }
            maks = Math.max(maks, val.length());
        }
        return maks;
    }

    // helper perataan kiri teks tabel sepanjang lebar kolom
    private static String padKanan(String teks, int lebar) {
        StringBuilder hasil = new StringBuilder(teks);
        while (hasil.length() < lebar) { // menambahkan spasi sampai sesuai lebar kolom
            hasil.append(" ");
        }
        return hasil.toString();
    }

    // prosedur untuk menampilkan tabel dinamis (lebar kolom menyesuaikan isi terpanjang)
    private static void tampilkanTabel() {
        if (daftarFilm.isEmpty()) {
            System.out.println("\nBelum ada data film.");
            return;
        }

        String[] kolom = {"ID", "Judul", "Genre", "Durasi", "Harga",
                           "Studio Animasi", "Rating Usia", "Frame Rate",
                           "Gaya Visual", "Jumlah Layer", "Resolusi"};
        int[] lebar = new int[kolom.length];
        for (int k = 0; k < kolom.length; k++) {
            lebar[k] = maxLength(kolom[k]) + 2;
        }

        System.out.println("\n=== DAFTAR FILM DI HOLO CINEMA ===");
        cetakGaris(lebar);

        StringBuilder header = new StringBuilder();
        for (int k = 0; k < kolom.length; k++) {
            header.append("|").append(padKanan(" " + kolom[k], lebar[k]));
        }
        header.append("|");
        System.out.println(header);
        cetakGaris(lebar);

        for (Film2D f : daftarFilm) {
            String[] nilai = {
                    String.valueOf(f.getId()), f.getJudul(), f.getGenre(),
                    f.getDurasi() + " mnt", "Rp" + f.getHarga(),
                    f.getStudioAnimasi(), f.getRatingUsia(), f.getFrameRate() + "fps",
                    f.getGayaVisual(), f.getJumlahLayer() + "L", f.getResolusi()
            };
            StringBuilder baris = new StringBuilder();
            for (int k = 0; k < nilai.length; k++) {
                baris.append("|").append(padKanan(" " + nilai[k], lebar[k]));
            }
            baris.append("|");
            System.out.println(baris);
        }
        cetakGaris(lebar);
    }

    private static void cetakGaris(int[] lebar) {
        StringBuilder garis = new StringBuilder();
        for (int w : lebar) {
            garis.append("+").append("-".repeat(w));
        }
        garis.append("+");
        System.out.println(garis);
    }

    // prosedur menambah 1 film baru (Add Saja, langsung Film2D lengkap: atribut Film + FilmAnimasi + Film2D)
    private static void tambahData() {
        int id_film = 0;
        boolean idValid = false; // flag validasi ID
        while (!idValid) {
            try {
                System.out.println("\nID Film: ");
                id_film = Integer.parseInt(scanner.nextLine());
                if (!isIdExists(id_film)) {
                    idValid = true;
                } else {
                    System.out.println("ID ini sudah ada. Silakan masukkan ID lain.");
                }
            } catch (NumberFormatException e) {
                System.out.println("Input tidak valid. Masukkan angka.");
            }
        }

        System.out.println("Judul Film: ");
        String judul = scanner.nextLine();

        System.out.println("Genre Film: ");
        String genre = scanner.nextLine();

        int durasi = 0;
        boolean durasiValid = false; // flag validasi durasi
        while (!durasiValid) {
            try {
                System.out.println("Durasi (menit): ");
                durasi = Integer.parseInt(scanner.nextLine());
                if (durasi < 0) {
                    System.out.println("Input tidak valid. Durasi tidak boleh negatif.");
                } else {
                    durasiValid = true;
                }
            } catch (NumberFormatException e) {
                System.out.println("Input tidak valid. Masukkan angka.");
            }
        }

        int harga = 0;
        boolean hargaValid = false; // flag validasi harga
        while (!hargaValid) {
            try {
                System.out.println("Harga Tiket (Rp): ");
                harga = Integer.parseInt(scanner.nextLine());
                if (harga <= 0) {
                    System.out.println("Input tidak valid. Harga harus lebih dari 0.");
                } else {
                    hargaValid = true;
                }
            } catch (NumberFormatException e) {
                System.out.println("Input tidak valid. Masukkan angka.");
            }
        }

        System.out.println("Studio Animasi: ");
        String studio_animasi = scanner.nextLine();

        System.out.println("Rating Usia (contoh: SU, 13+, 17+): ");
        String rating_usia = scanner.nextLine();

        int frame_rate = 0;
        boolean frameRateValid = false; // flag validasi frame rate
        while (!frameRateValid) {
            try {
                System.out.println("Frame Rate (fps): ");
                frame_rate = Integer.parseInt(scanner.nextLine());
                if (frame_rate <= 0) {
                    System.out.println("Input tidak valid. Frame rate harus lebih dari 0.");
                } else {
                    frameRateValid = true;
                }
            } catch (NumberFormatException e) {
                System.out.println("Input tidak valid. Masukkan angka.");
            }
        }

        System.out.println("Gaya Visual (contoh: Hand-drawn, Cel Shading, Chibi): ");
        String gaya_visual = scanner.nextLine();

        int jumlah_layer = 0;
        boolean layerValid = false; // flag validasi jumlah layer
        while (!layerValid) {
            try {
                System.out.println("Jumlah Layer Animasi: ");
                jumlah_layer = Integer.parseInt(scanner.nextLine());
                if (jumlah_layer <= 0) {
                    System.out.println("Input tidak valid. Jumlah layer harus lebih dari 0.");
                } else {
                    layerValid = true;
                }
            } catch (NumberFormatException e) {
                System.out.println("Input tidak valid. Masukkan angka.");
            }
        }

        System.out.println("Resolusi (contoh: 1920x1080): ");
        String resolusi = scanner.nextLine();

        daftarFilm.add(new Film2D(id_film, judul, genre, durasi, harga,
                studio_animasi, rating_usia, frame_rate,
                gaya_visual, jumlah_layer, resolusi));
        System.out.println("\nFilm berhasil ditambahkan!");
    }

    public static void main(String[] args) {
        // 5 data awal (wajib ada sebelum ada input user)
        daftarFilm.add(new Film2D(101, "Senja di Negeri Angin", "Slice of Life", 92, 38000, "Studio Awan", "SU", 24, "Hand-drawn Klasik", 12, "1920x1080"));
        daftarFilm.add(new Film2D(102, "Petualangan Rimba", "Petualangan", 96, 40000, "Kagaya Studio", "SU", 24, "Cel Shading", 10, "1920x1080"));
        daftarFilm.add(new Film2D(103, "Legenda Naga Emas", "Fantasi", 110, 42000, "Rantau Animation", "13+", 30, "Flat Design", 14, "2560x1440"));
        daftarFilm.add(new Film2D(104, "Kisah Daun Jatuh", "Drama", 88, 35000, "Kertas Animasi", "SU", 24, "Cat Air Digital", 10, "1280x720"));
        daftarFilm.add(new Film2D(105, "Roda Waktu", "Fantasi", 95, 40000, "Wonder Studio", "13+", 30, "Chibi", 8, "1920x1080"));

        String pilihan = "";
        while (!pilihan.equals("3")) { // berhenti jika user memilih 3 (Keluar)
            System.out.println("\n=== MENU HOLO CINEMA (TP2) ===");
            System.out.println("1. Tampilkan Daftar Film");
            System.out.println("2. Tambah Film Baru");
            System.out.println("3. Keluar");
            System.out.print("Pilih menu: ");
            pilihan = scanner.nextLine();

            if (pilihan.equals("1")) {
                tampilkanTabel();
            } else if (pilihan.equals("2")) {
                tambahData();
            } else if (pilihan.equals("3")) {
                System.out.println("\nTerima kasih sudah menggunakan sistem Holo Cinema!");
            } else {
                System.out.println("Pilihan tidak valid. Coba lagi");
            }
        }
    }
}
