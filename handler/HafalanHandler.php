<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once 'handler/AuthGuardHandler.php';

// Pagination
$limit = 20; // data per halaman
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch setoran hafalan terbaru dengan pagination
$stmt = $pdo->prepare("
    SELECT s.id AS setoran_id, s.tanggal, santri.id AS santri_id, santri.nama AS nama_santri, kelas.nama_kelas, 
           surah.nama_surah, s.ayat, s.jenis, s.skor, s.status
    FROM setoran s
    JOIN santri ON s.santri_id = santri.id
    JOIN kelas ON santri.kelas_id = kelas.id
    JOIN surah ON s.surah_id = surah.id
    ORDER BY s.tanggal DESC
    LIMIT :limit OFFSET :offset");

$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$setoranTerbaru = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Hitung total data
$totalStmt = $pdo->query("SELECT COUNT(*) FROM setoran");
$totalData = $totalStmt->fetchColumn();
$totalPages = ceil($totalData / $limit);


