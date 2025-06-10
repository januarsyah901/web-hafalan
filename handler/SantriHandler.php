<?php
global $pdo;
require_once __DIR__ . '/../env/config.php';
require_once __DIR__ . '/../handler/AuthGuardHandler.php';


$stmt = $pdo->query("SELECT s.*, k.nama_kelas FROM santri AS s JOIN kelas AS k ON s.kelas_id = k.id ORDER BY k.nama_kelas DESC");
$santri = $stmt->fetchAll();
//var_dump($santri);