<?php
$host = "localhost";
$dbname = "u985354573_hafalanyuk";
$username = "u985354573_Bangjan114";
$password = "Bangjan114";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
} catch (PDOException $e) {
    // Jangan tampilkan ini ke user langsung di production
    error_log("Connection error: " . $e->getMessage());
    die("Database connection failed.");
}

