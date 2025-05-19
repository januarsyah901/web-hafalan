<?php
session_start();
global $pdo;
require_once 'env/config.php';
require_once 'handler/AuthGuardHandler.php';

// Pagination
$limit = 10; // data per halaman
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Hitung total data
$totalStmt = $pdo->query("SELECT COUNT(*) FROM setoran");
$totalData = $totalStmt->fetchColumn();
$totalPages = ceil($totalData / $limit);


// Fetch total santri
$stmt = $pdo->query("SELECT COUNT(*) AS total_santri FROM santri");
$totalSantri = $stmt->fetchColumn();

// Fetch hafalan minggu ini
$stmt = $pdo->query("SELECT COUNT(*) AS hafalan_minggu_ini
FROM setoran
WHERE YEARWEEK(tanggal, 1) = YEARWEEK(CURDATE(), 1);
");
$hafalanMingguIni = $stmt->fetchColumn();

// Fetch ziyadah bulan ini
$stmt = $pdo->query("SELECT COUNT(*) AS ziyadah_bulan_ini
FROM setoran
WHERE jenis = 'Ziyadah'
  AND MONTH(tanggal) = MONTH(CURDATE())
  AND YEAR(tanggal) = YEAR(CURDATE());
");
$ziyadahBulanIni = $stmt->fetchColumn();

// Fetch murajaah bulan ini
$stmt = $pdo->query("SELECT COUNT(*) AS murajaah_bulan_ini
FROM setoran
WHERE jenis = 'Murajaah'
  AND MONTH(tanggal) = MONTH(CURDATE())
  AND YEAR(tanggal) = YEAR(CURDATE());
");
$murajaahBulanIni = $stmt->fetchColumn();

// Fetch setoran hafalan terbaru
$stmt = $pdo->prepare("
    SELECT s.tanggal, santri.nama AS nama_santri, kelas.nama_kelas, 
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



