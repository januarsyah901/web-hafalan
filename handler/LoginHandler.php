<?php
session_start();
global $pdo;
include 'env/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi input dasar
    if (empty($username) || empty($password)) {
        echo "Username dan password harus diisi.";
        exit;
    }

    // Ambil data user berdasarkan username
    $stmt = $pdo->prepare("SELECT * FROM ustadz WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Simpan hanya data penting ke session
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama'];

        header("Location: dashboard.php");
        echo "<script>window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
