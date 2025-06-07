<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once __DIR__ . '/../handler/AuthGuardHandler.php';
require_once __DIR__ . '/../handler/DashboardHandler.php';

// Load existing hafalan data
if (empty($_GET['id'])) {
    echo "ID hafalan tidak ditemukan.";
    exit;
}

$id = $_GET['id'];

// Query untuk mendapatkan detail hafalan
$stmt = $pdo->prepare("
    SELECT s.id, s.tanggal, s.jenis, s.ayat, s.catatan, s.skor, s.status, surah.id AS surah_id, 
    santri.id AS santri_id, santri.nama AS nama_santri, 
    kelas.id AS kelas_id, kelas.nama_kelas AS nama_kelas,
    surah.id AS surah_id, surah.nama_surah
    FROM setoran s
    JOIN santri ON s.santri_id = santri.id
    JOIN kelas ON santri.kelas_id = kelas.id 
    JOIN surah ON s.surah_id = surah.id
    WHERE s.id = :id
");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$hafalan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$hafalan) {
    echo "Data hafalan tidak ditemukan.";
    exit;
}

// Get all surah for dropdown
$stmtSurah = $pdo->query("
    SELECT id, nama_surah
    FROM surah
    ORDER BY id
");
$surahList = $stmtSurah->fetchAll(PDO::FETCH_ASSOC);

// Update hafalan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_hafalan'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $santri_id = $_POST['santri_id'];
    $surah_id = $_POST['surah_id'];
    $ayat = $_POST['ayatValue'];
    $jenis = $_POST['jenis'];
    $skor = $_POST['skor'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    // Validasi data dasar (kamu bisa kembangkan)
    if (!is_numeric($skor) || $skor < 0 || $skor > 100) {
        $_SESSION['error'] = "Skor harus antara 0 hingga 100.";
        header("Location: ../editHafalan.php?id=" . $id);
        exit;
    }

    try {
        $stmt = $pdo->prepare("
            UPDATE setoran
            SET tanggal = :tanggal,
                santri_id = :santri_id,
                surah_id = :surah_id,
                ayat = :ayat,
                jenis = :jenis,
                skor = :skor,
                status = :status,
                catatan = :catatan
            WHERE id = :id
        ");

        $stmt->execute([
            'tanggal' => $tanggal,
            'santri_id' => $santri_id,
            'surah_id' => $surah_id,
            'ayat' => $ayat,
            'jenis' => $jenis,
            'skor' => $skor,
            'status' => $status,
            'catatan' => $catatan,
            'id' => $id,
        ]);

        header("Location: ../showHafalan.php?id=" . $id);
        exit;

    } catch (PDOException $e) {
        $_SESSION['error'] = "Gagal memperbarui data: " . $e->getMessage();
        header("Location: ../editHafalan.php?id=" . $id);
        exit;
    }

} else {
    $_SESSION['error'] = "Permintaan tidak valid.";
    header("Location: ../index.php");
    exit;
}