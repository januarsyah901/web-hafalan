<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once __DIR__ . '/../handler/AuthGuardHandler.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>console.error('ID hafalan tidak ditemukan.');</script>";
    exit;
}


$id = $_GET['id'];

// Query untuk mendapatkan detail hafalan
$stmt = $pdo->prepare("
SELECT s.tanggal, s.jenis, s.ayat, s.catatan, s.skor, s.status,
santri.nama AS nama_santri, kelas.nama_kelas, surah.nama_surah
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