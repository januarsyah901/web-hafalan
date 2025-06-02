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

// Proses submit form
// Menampilkan value yang di kirim dalam method POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    var_dump($_POST);
//    var_dump($_POST);
    $santri_id = $_POST['santri_id'] ?? null;
    $jenis_hafalan = $_POST['jenis_hafalan'] ?? null;
    $surah_id = $_POST['surah_id'] ?? null;
    $catatan = $_POST['catatan'] ?? null;
    $ayat = isset($_POST['ayat_mulai'], $_POST['ayat_akhir']) ? $_POST['ayat_mulai'] . '-' . $_POST['ayat_akhir'] : null;

//    var_dump($ayat);

    $errors = [];
    $error_message = '';

    // Validasi input

    if (empty($errors)) {
        try {
            // Validasi kelas_id
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM santri WHERE id = ?");
            $stmt->execute([$santri_id]);
            if ($stmt->fetchColumn() == 0) {
                $errors[] = "Santri yang dipilih tidak valid";
            }
            // Validasi jenis hafalan
            if (!in_array($jenis_hafalan, ['Ziyadah', 'Murajaah'])) {
                $errors[] = "Jenis hafalan tidak valid";
            }
            // Validasi surah_id
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM surah WHERE id = ?");
            $stmt->execute([$surah_id]);
            if ($stmt->fetchColumn() == 0) {
                $errors[] = "Surah yang dipilih tidak valid";
            }

            // Validasi catatan
            if (strlen($catatan) > 255) {
                $errors[] = "Catatan tidak boleh lebih dari 255 karakter";
            }
//            var_dump($errors);

            // Jika tidak ada error, lanjutkan ke penyimpanan data
            if (empty($errors)) {


                $stmt = $pdo->prepare("
                    INSERT INTO setoran (santri_id, jenis, surah_id, ayat, catatan, tanggal, skor)
                    VALUES (?, ?, ?, ?, ?, NOW(), 0)
                ");
                $stmt->execute([$santri_id, $jenis_hafalan, $surah_id, $ayat, $catatan]);
                $success_message = "Data hafalan berhasil disimpan!";
            }

        } catch (PDOException $e) {

            $error_message = "Error saat menyimpan data: " . $e->getMessage();
        }
    } else {

        $error_message = "Terdapat kesalahan:\n" . implode("\n", $errors);
    }

}