<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once __DIR__ . '/../handler/AuthGuardHandler.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil ID santri dari form, ini penting untuk UPDATE
    $santri_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Validasi ID Santri
    if (!$santri_id) {
        $_SESSION['error_message'] = "ID santri tidak ditemukan untuk diedit.";
        header('Location: ../index.php'); // Redirect ke halaman daftar santri atau halaman error
        exit();
    }

//    var_dump($_POST);

    // Ambil dan sanitasi data dari form
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tempat_lahir = filter_input(INPUT_POST, 'tempat_lahir', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tanggal_lahir = filter_input(INPUT_POST, 'tanggal_lahir', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Biarkan sebagai string, akan divalidasi format tanggal
    $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $kelas_id = filter_input(INPUT_POST, 'kelas_id', FILTER_SANITIZE_NUMBER_INT);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nama_ortu = filter_input(INPUT_POST, 'nama_ortu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tanggal_masuk = filter_input(INPUT_POST, 'tanggal_masuk', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Biarkan sebagai string
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $catatan = filter_input(INPUT_POST, 'catatan', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // --- Validasi Data ---
    $errors = [];

    if (empty($nama)) {
        $errors[] = "Nama lengkap wajib diisi.";
    }
    if (empty($tempat_lahir)) {
        $errors[] = "Tempat lahir wajib diisi.";
    }
    if (empty($tanggal_lahir) || !strtotime($tanggal_lahir)) {
        $errors[] = "Tanggal lahir tidak valid.";
    }
    if (!in_array($jenis_kelamin, ['L', 'P'])) {
        $errors[] = "Jenis kelamin tidak valid.";
    }
    if (empty($kelas_id) || !is_numeric($kelas_id)) {
        $errors[] = "Kelas wajib dipilih.";
    }
    if (empty($tanggal_masuk) || !strtotime($tanggal_masuk)) {
        $errors[] = "Tanggal masuk tidak valid.";
    }
    if (!in_array($status, ['aktif', 'nonaktif'])) { // Sesuaikan dengan value di form
        $errors[] = "Status tidak valid.";
    }

    // Jika ada error validasi, simpan ke sesi dan redirect
    if (!empty($errors)) {
        $_SESSION['error_message'] = implode("<br>", $errors);
        // Redirect kembali ke halaman edit dengan ID santri agar data sebelumnya bisa dimuat ulang
        header('Location: ../editSantri.php?santri_id=' . $santri_id);
        exit();
    }

    // --- Proses Update Data ---
    try {
        $pdo->beginTransaction(); // Mulai transaksi

        $sql = "UPDATE santri SET
                    nama = :nama,
                    tempat_lahir = :tempat_lahir,
                    tanggal_lahir = :tanggal_lahir,
                    jenis_kelamin = :jenis_kelamin,
                    kelas_id = :kelas_id,
                    alamat = :alamat,
                    nama_ortu = :nama_ortu,
                    no_telp = :no_telp,
                    tanggal_masuk = :tanggal_masuk,
                    status = :status,
                    catatan = :catatan
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tempat_lahir', $tempat_lahir);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':kelas_id', $kelas_id);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':nama_ortu', $nama_ortu);
        $stmt->bindParam(':no_telp', $no_telp);
        $stmt->bindParam(':tanggal_masuk', $tanggal_masuk);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':catatan', $catatan);
        $stmt->bindParam(':id', $santri_id);

        $stmt->execute();

        $pdo->commit(); // Commit transaksi jika berhasil

        $_SESSION['success_message'] = "Data santri berhasil diperbarui!";
        header('Location: ../showSantri.php?santri_id=' . $santri_id); // Redirect ke halaman detail santri yang baru diedit
        exit();

    } catch (PDOException $e) {
        $pdo->rollBack(); // Rollback transaksi jika terjadi error
        $_SESSION['error_message'] = "Terjadi kesalahan database saat memperbarui santri: " . $e->getMessage();
        header('Location: ../editSantri.php?santri_id=' . $santri_id); // Redirect kembali ke halaman edit
        exit();
    }

} else {
    // Jika bukan POST request, arahkan kembali
    $_SESSION['error_message'] = "Akses tidak sah.";
    header('Location: ../index.php'); // Atau halaman yang sesuai
    exit();
}