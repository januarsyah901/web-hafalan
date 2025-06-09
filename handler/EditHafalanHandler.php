<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once __DIR__ . '/../handler/AuthGuardHandler.php';
require_once __DIR__ . '/../handler/DashboardHandler.php';
require_once __DIR__ . '/../handler/DeleteHafalanHandler.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = 'Metode request tidak valid';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
// Sanitasi input
$id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
$skor = filter_var($_POST['skor'], FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 0, 'max_range' => 100]
]);

$status = in_array($_POST['status'], ['Lulus', 'Perlu diulang', 'Gagal', 'Proses'])
    ? $_POST['status']
    : 'Proses';
$catatan = isset($_POST['catatan']) ? filter_var($_POST['catatan']) : null;


if (isset($_POST['delete_hafalan'])) {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM setoran WHERE id = ?");
        $stmt->execute([$id]);

        $_SESSION['success'] = "Hafalan berhasil dihapus.";
        header("Location: ../index.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = "Gagal menghapus hafalan: " . $e->getMessage();
        echo 'script>alert("Gagal menghapus hafalan: ' . $e->getMessage() . '");</script>';
        header("Location: ../editHafalan.php?id=$id");
        exit;
    }
}

// Validasi data
if (!$id || $skor === false) {
    $_SESSION['error'] = 'Data yang dimasukkan tidak valid';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

try {

    $stmt = $pdo->prepare("UPDATE setoran SET 
        skor = :skor,
        status = :status,
        catatan = :catatan
        WHERE id = :id");

    // Bind parameter
    $stmt->bindParam(':skor', $skor, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':catatan', $catatan, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Eksekusi query
    $stmt->execute();

    // Redirect ke halaman detail dengan pesan sukses
    $_SESSION['success'] = 'Data hafalan berhasil diperbarui';
    header('Location: ../showHafalan.php?id=' . $id);
    exit;

} catch (PDOException $e) {
    // Tangani error database
    $_SESSION['error'] = 'Gagal memperbarui data hafalan: ' . $e->getMessage();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
