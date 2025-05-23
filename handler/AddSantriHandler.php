<?php
global $pdo;
require_once 'env/config.php';
require_once 'handler/AuthGuardHandler.php';

// Fetch kelas data untuk dropdown
$stmt = $pdo->query("SELECT id, nama_kelas FROM kelas");
$kelasOptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Proses submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $tempat_lahir = $_POST['tempat_lahir'] ?? '';
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $kelas_id = $_POST['kelas_id'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $nama_ortu = $_POST['nama_ortu'] ?? '';
    $no_telp = $_POST['no_telp'] ?? '';
    $tanggal_masuk = $_POST['tanggal_masuk'] ?? '';
    $status = $_POST['status'] ?? '';
    $catatan = $_POST['catatan'] ?? '';


    $errors = [];
    $error_message = '';

    // Validasi format tanggal
    if (!empty($tanggal_lahir) && !DateTime::createFromFormat('Y-m-d', $tanggal_lahir)) {
        $errors[] = "Format tanggal lahir tidak valid";
    }

    if (!empty($tanggal_masuk) && !DateTime::createFromFormat('Y-m-d', $tanggal_masuk)) {
        $errors[] = "Format tanggal masuk tidak valid";
    }


    if (empty($errors)) {
        try {
            // Validasi kelas_id
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM kelas WHERE id = ?");
            $stmt->execute([$kelas_id]);
            if ($stmt->fetchColumn() == 0) {
                $errors[] = "Kelas yang dipilih tidak valid";
            }

            if (empty($errors)) {
                $stmt = $pdo->prepare("
                    INSERT INTO santri (
                        nama, tempat_lahir, tanggal_lahir, jenis_kelamin, 
                        kelas_id, alamat, nama_ortu, no_telp, 
                        tanggal_masuk, status, catatan
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ");

                $stmt->execute([
                    $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin,
                    $kelas_id, $alamat, $nama_ortu, $no_telp,
                    $tanggal_masuk, $status, $catatan
                ]);

                $success_message = "Data santri berhasil ditambahkan!";

                // Bersihkan input setelah berhasil
                $_POST = [];
            }

        } catch (PDOException $e) {
            $error_message = "Error saat menyimpan data: " . $e->getMessage();
        }
    } else {
        $error_message = "Terdapat kesalahan:\n" . implode("\n", $errors);
    }
}