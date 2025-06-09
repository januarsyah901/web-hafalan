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
