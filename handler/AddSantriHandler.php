<?php
global $pdo;
require_once 'env/config.php';
require_once 'handler/AuthGuardHandler.php';

// Fetch kelas data untuk dropdown
$stmt = $pdo->query("SELECT id, nama_kelas FROM kelas");
$kelasOptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inisialisasi variabel
$errors = [];
$error_message = '';
$success_message = '';

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

    // Validasi form input
    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong";
    } elseif (!preg_match("/^[a-zA-Z\s'.]+$/", $nama)) {
        $errors[] = "Nama hanya boleh berisi huruf, spasi, petik, dan titik";
    }

    if (empty($tempat_lahir)) {
        $errors[] = "Tempat lahir tidak boleh kosong";
    } elseif (!preg_match("/^[a-zA-Z\s,.]+$/", $tempat_lahir)) {
        $errors[] = "Tempat lahir hanya boleh berisi huruf, spasi, koma, dan titik";
    }

    if (empty($tanggal_lahir)) {
        $errors[] = "Tanggal lahir tidak boleh kosong";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $tanggal_lahir)) {
        $errors[] = "Format tanggal lahir harus YYYY-MM-DD";
    }

    if (empty($jenis_kelamin)) {
        $errors[] = "Jenis kelamin harus dipilih";
    } elseif (!in_array($jenis_kelamin, ['L', 'P'])) {
        $errors[] = "Jenis kelamin tidak valid";
    }

    if (empty($kelas_id)) {
        $errors[] = "Kelas harus dipilih";
    } elseif (!is_numeric($kelas_id)) {
        $errors[] = "ID kelas tidak valid";
    }

    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong";
    }

    if (empty($nama_ortu)) {
        $errors[] = "Nama orang tua tidak boleh kosong";
    } elseif (!preg_match("/^[a-zA-Z\s'.]+$/", $nama_ortu)) {
        $errors[] = "Nama orang tua hanya boleh berisi huruf, spasi, petik, dan titik";
    }

    if (empty($no_telp)) {
        $errors[] = "Nomor telepon tidak boleh kosong";
    } elseif (!preg_match("/^[0-9+\-()]{8,15}$/", $no_telp)) {
        $errors[] = "Format nomor telepon tidak valid";
    }

    if (empty($tanggal_masuk)) {
        $errors[] = "Tanggal masuk tidak boleh kosong";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $tanggal_masuk)) {
        $errors[] = "Format tanggal masuk harus YYYY-MM-DD";
    }

    if (empty($status)) {
        $errors[] = "Status tidak boleh kosong";
    } elseif (!in_array($status, ['aktif', 'nonaktif'])) {
        $errors[] = "Status tidak valid";
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
