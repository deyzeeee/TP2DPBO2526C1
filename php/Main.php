<?php
require_once 'Film2D.php'; // otomatis ikut require FilmAnimasi.php dan Film.php
session_start();

// Reset SESSION
if (isset($_POST['reset_data'])) {
    session_unset();
    session_destroy();
    header("Location: Main.php");
    exit(); // biar exit langsung page nya
}

// Inisialisasi session dengan 5 data awal (wajib ada sebelum ada input user).
// Hanya class Film2D yang dibuat objeknya, karena sudah mewarisi seluruh atribut
// Film dan FilmAnimasi (1 objek = data lengkap dari ketiga class).
if (!isset($_SESSION['daftarFilm'])) {
    $_SESSION['daftarFilm'] = [
        new Film2D(101, "Senja di Negeri Angin", "Slice of Life", 92, 38000, "", "Studio Awan", "SU", 24, "Hand-drawn Klasik", 12, "1920x1080"),
        new Film2D(102, "Petualangan Rimba", "Petualangan", 96, 40000, "", "Kagaya Studio", "SU", 24, "Cel Shading", 10, "1920x1080"),
        new Film2D(103, "Legenda Naga Emas", "Fantasi", 110, 42000, "", "Rantau Animation", "13+", 30, "Flat Design", 14, "2560x1440"),
        new Film2D(104, "Kisah Daun Jatuh", "Drama", 88, 35000, "", "Kertas Animasi", "SU", 24, "Cat Air Digital", 10, "1280x720"),
        new Film2D(105, "Roda Waktu", "Fantasi", 95, 40000, "", "Wonder Studio", "13+", 30, "Chibi", 8, "1920x1080"),
    ];
}

$message = '';
$message_type = '';

// helper cek ID
function isIdExists($id_film, $list) {
    $ada = false; // flag
    $i = 0; // index
    $total = count($list); // jumlah elemen
    while ($i < $total && !$ada) // looping, berhenti jika sudah ketemu
    {
        if ($list[$i]->getId() === $id_film) {
            $ada = true;
        }
        $i++;
    }
    return $ada;
}

// Tambah film (Add Saja, sesuai ketentuan TP2) - langsung Film2D lengkap
if (isset($_POST['tambah'])) {
    $id_film = (int) trim($_POST['id_film']);
    $judul = trim($_POST['judul']);
    $genre = trim($_POST['genre']);
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];
    $studio_animasi = trim($_POST['studio_animasi'] ?? '');
    $rating_usia = trim($_POST['rating_usia'] ?? '');
    $frame_rate = $_POST['frame_rate'] ?? '';
    $gaya_visual = trim($_POST['gaya_visual'] ?? '');
    $jumlah_layer = $_POST['jumlah_layer'] ?? '';
    $resolusi = trim($_POST['resolusi'] ?? '');

    // Validasi seluruh atribut (Film + FilmAnimasi + Film2D)
    if (
        empty($id_film) || empty($judul) || empty($genre) ||
        !is_numeric($durasi) || !is_numeric($harga) || $durasi < 0 || $harga <= 0 ||
        $studio_animasi === '' || $rating_usia === '' || !is_numeric($frame_rate) || $frame_rate <= 0 ||
        $gaya_visual === '' || !is_numeric($jumlah_layer) || $jumlah_layer <= 0 || $resolusi === ''
    ) {
        $message = "❌ Input tidak valid. Pastikan seluruh form terisi dengan benar.";
        $message_type = 'error';
    } elseif (isIdExists($id_film, $_SESSION['daftarFilm'])) {
        $message = "❌ ID sudah ada. Gagal menambahkan film.";
        $message_type = 'error';
    } elseif (empty($_FILES['poster']['name']) || $_FILES['poster']['error'] !== 0) {
        $message = "❌ Poster wajib diunggah.";
        $message_type = 'error';
    } else {
        // Upload poster (atribut foto khusus PHP)
        $target_dir = "./images/";
        if (!is_dir($target_dir)) mkdir($target_dir); // cek jika folder belum ada maka buat folder
        $target_file = $target_dir . time() . "_" . basename($_FILES["poster"]["name"]);

        if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
            $_SESSION['daftarFilm'][] = new Film2D($id_film, $judul, $genre, (int)$durasi, (int)$harga, $target_file,
                                                    $studio_animasi, $rating_usia, (int)$frame_rate,
                                                    $gaya_visual, (int)$jumlah_layer, $resolusi);
            $message = "✅ Film berhasil ditambahkan!";
            $message_type = 'success';
        } else {
            $message = "❌ Gagal mengunggah poster.";
            $message_type = 'error';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>WELCOME TO HOLO CINEMA - TP2</title>

<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 20px;
    min-height: 100vh;
    background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.container {
    width: 100%;
    max-width: 1300px;
    background: rgba(255, 255, 255, 0.9);
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 6px;
    font-size: 2.1rem;
}

.subjudul {
    text-align: center;
    color: #576574;
    margin-bottom: 20px;
}

.message {
    padding: 14px;
    margin-bottom: 18px;
    border-radius: 8px;
    font-weight: bold;
    text-align: center;
}

.success { background: #d4edda; color: #155724; }
.error { background: #f8d7da; color: #721c24; }

form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    background: #fdfdfd;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #eee;
}

form input, form button {
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

form button {
    cursor: pointer;
    font-weight: bold;
    border: none;
    background: #2ecc71;
    color: white;
}

form button:hover { opacity: 0.9; }

fieldset {
    border: 1px dashed #b2bec3;
    border-radius: 8px;
    padding: 12px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

legend {
    font-weight: bold;
    color: #6c5ce7;
    padding: 0 6px;
}

.table-wrap {
    overflow-x: auto;
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px;
    border: 1px solid #eee;
    text-align: left;
    white-space: nowrap;
}

thead {
    background: linear-gradient(135deg, #6c5ce7, #0984e3);
    color: white;
}

tbody tr:nth-child(even) { background: #f9f9f9; }
tbody tr:hover { background: #f1f7ff; }

.product-img {
    max-width: 70px;
    border-radius: 8px;
}

.reset-container {
    text-align: center;
    margin-top: 20px;
}

.btn-reset {
    background: #e74c3c;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    cursor: pointer;
}
</style>
</head>
<body>
<div class="container">
    <h1>🎬 WELCOME TO HOLO CINEMA</h1>
    <p class="subjudul">TP2 DPBO — Multilevel Inheritance: Film &rarr; FilmAnimasi &rarr; Film2D</p>

    <?php if ($message): ?>
        <div class="message <?= $message_type; ?>"><?= $message; ?></div>
    <?php endif; ?>

    <form action="Main.php" method="POST" enctype="multipart/form-data">
        <h2>➕ Tambah Film Baru</h2>

        <input type="number" name="id_film" placeholder="ID Film" required>
        <input type="text" name="judul" placeholder="Judul Film" required>
        <input type="text" name="genre" placeholder="Genre Film" required>
        <input type="number" name="durasi" placeholder="Durasi (menit)" required>
        <input type="number" name="harga" placeholder="Harga Tiket (Rp)" required>
        <input type="file" name="poster" required>

        <fieldset>
            <legend>Atribut Film Animasi</legend>
            <input type="text" name="studio_animasi" placeholder="Studio Animasi" required>
            <input type="text" name="rating_usia" placeholder="Rating Usia (contoh: SU, 13+, 17+)" required>
            <input type="number" name="frame_rate" placeholder="Frame Rate (fps)" required>
        </fieldset>

        <fieldset>
            <legend>Atribut Film 2D</legend>
            <input type="text" name="gaya_visual" placeholder="Gaya Visual (contoh: Hand-drawn, Cel Shading)" required>
            <input type="number" name="jumlah_layer" placeholder="Jumlah Layer Animasi" required>
            <input type="text" name="resolusi" placeholder="Resolusi (contoh: 1920x1080)" required>
        </fieldset>

        <button type="submit" name="tambah">Tambah Data</button>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Poster</th><th>ID</th><th>Judul</th><th>Genre</th><th>Durasi</th><th>Harga</th>
                    <th>Studio Animasi</th><th>Rating Usia</th><th>Frame Rate</th>
                    <th>Gaya Visual</th><th>Jumlah Layer</th><th>Resolusi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($_SESSION['daftarFilm'])): ?>
                    <tr><td colspan="12" style="text-align:center;">🚫 Tidak ada data film.</td></tr>
                <?php else: ?>
                    <?php foreach ($_SESSION['daftarFilm'] as $film): ?>
                        <tr>
                            <td>
                                <?php if ($film->getPoster() && file_exists($film->getPoster())): ?>
                                    <img src="<?= htmlspecialchars($film->getPoster()); ?>" class="product-img">
                                <?php else: ?>
                                    ❌
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($film->getId()); ?></td>
                            <td><?= htmlspecialchars($film->getJudul()); ?></td>
                            <td><?= htmlspecialchars($film->getGenre()); ?></td>
                            <td><?= $film->getDurasi() . ' menit'; ?></td>
                            <td><?= 'Rp ' . number_format($film->getHarga(), 0, ',', '.'); ?></td>
                            <td><?= htmlspecialchars($film->getStudioAnimasi()); ?></td>
                            <td><?= htmlspecialchars($film->getRatingUsia()); ?></td>
                            <td><?= $film->getFrameRate() . ' fps'; ?></td>
                            <td><?= htmlspecialchars($film->getGayaVisual()); ?></td>
                            <td><?= $film->getJumlahLayer() . ' layer'; ?></td>
                            <td><?= htmlspecialchars($film->getResolusi()); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="reset-container">
        <form action="Main.php" method="POST">
            <button type="submit" name="reset_data" class="btn-reset" onclick="return confirm('Hapus semua data film?');">🧹 Reset Data</button>
        </form>
    </div>
</div>
</body>
</html>
