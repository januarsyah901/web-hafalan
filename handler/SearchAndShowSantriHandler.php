<?php
global $setoranTerbaru, $pdo, $santri;

function tampilkanSantriRow($s): void
{
//    var_dump($s);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($s['nama']) . "</td>";
    echo "<td>" . htmlspecialchars($s['nama_kelas']) . "</td>";
    echo "<td>" . htmlspecialchars($s['tempat_lahir']) . "</td>";
    echo "<td>" . date('d M Y', strtotime($s['tanggal_lahir'])) . "</td>";
    echo "<td>" . htmlspecialchars($s['jenis_kelamin']) . "</td>";
    echo "<td>" . htmlspecialchars($s['alamat']) . "</td>";
    echo "<td>" . htmlspecialchars($s['nama_ortu']) . "</td>";
    echo "<td>" . htmlspecialchars($s['no_telp']) . "</td>";
    echo "<td>" . date('d M Y', strtotime($s['tanggal_masuk'])) . "</td>";
    echo "<td>" . htmlspecialchars($s['status']) . "</td>";
    // Aksi
    echo "<td>";
    echo '<a href="editHafalan.php?id=' . $s['id'] . '" type="button" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>';
    echo '<a href="showHafalan.php?id=' . $s['id'] . '" type="button" class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-eye"></i> </a>';
    echo "</td>";
    echo "</tr>";
}

if (isset($_GET['search']) && trim($_GET['search']) !== '') {
    $search = $_GET['search'];

    // Query pencarian
    $query = "
        SELECT s.*, k.nama_kelas FROM santri s JOIN kelas AS k ON s.kelas_id = k.id 
        WHERE s.nama LIKE :search
        ORDER BY k.nama_kelas DESC
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            tampilkanSantriRow($row);
        }
    } else {
        echo "<tr><td colspan='9' class='text-center'>Tidak ada data ditemukan</td></tr>";
    }
} else {
    // Tampilkan data default (setoran terbaru)
    foreach ($santri as $s) {
        tampilkanSantriRow($s);
    }
}

