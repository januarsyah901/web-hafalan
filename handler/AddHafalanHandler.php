<?php
global $pdo;
require_once 'env/config.php';
require_once 'handler/AuthGuardHandler.php';

// Queri seluruh nama santri dan kelas
$stmt = $pdo->query("SELECT s.id, s.nama, k.nama_kelas FROM santri AS s JOIN kelas AS k ON s.kelas_id = k.id");
$santri = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Queri seluruh nama surah
$stmt = $pdo->query("SELECT id, nama_surah FROM surah");
$surah = $stmt->fetchAll(PDO::FETCH_ASSOC);