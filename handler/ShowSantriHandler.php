<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once __DIR__ . '/../handler/AuthGuardHandler.php';

// Preview detail santri
if (isset($_GET['santri_id'])) {
    $santri_id = $_GET['santri_id'];
    $stmt = $pdo->prepare("SELECT s.*, k.nama_kelas FROM santri AS s JOIN kelas AS k ON s.kelas_id = k.id WHERE s.id = ?");
    $stmt->execute([$santri_id]);
    $santri = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$santri) {
        $error_message = "Santri tidak ditemukan.";
    }
}

// Fetch kelas data untuk dropdown
$stmt = $pdo->query("SELECT id, nama_kelas FROM kelas");
$kelasOptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kosongkan pesan sukses dan error di sesion



