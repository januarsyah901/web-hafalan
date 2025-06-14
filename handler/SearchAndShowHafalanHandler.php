<?php
global $setoranTerbaru, $pdo;

function tampilkanSetoranRow($row): void
{

    echo "<tr>";
    echo "<td>" . date('d M Y', strtotime($row['tanggal'])) . "</td>";
    echo "<td>" . htmlspecialchars($row['nama_santri']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nama_kelas']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nama_surah']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ayat']) . "</td>";

    // Jenis Setoran
    $jenis = htmlspecialchars($row['jenis']);
    $badgeJenis = match ($jenis) {
        'Ziyadah' => "<span class='badge bg-info'>$jenis</span>",
        'Murajaah' => "<span class='badge bg-primary text-white'>$jenis</span>",
        default => $jenis
    };
    echo "<td>$badgeJenis</td>";

    // Skor
    $skor = htmlspecialchars($row['skor']);
    $status = $row['status'];
    $skorClass = match ($status) {
        'Lulus' => 'text-success',
        'Perlu diulang' => 'text-warning',
        'Gagal' => 'text-danger',
        default => ''
    };
    echo "<td><span class='fw-bold $skorClass'>$skor</span></td>";

    // Status
    $statusText = htmlspecialchars($status);
    $badgeStatus = match ($status) {
        'Lulus' => "<span class='badge bg-success'>$statusText</span>",
        'Perlu diulang' => "<span class='badge bg-warning text-dark'>$statusText</span>",
        'Proses' => "<span class='badge bg-primary'>$statusText</span>",

        default => $statusText
    };
    echo "<td>$badgeStatus</td>";



    // Aksi Modal
    echo "<td>";
//    echo '<a id="editHafalan" type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
//           data-bs-target="#editHafalanModal" data-id="' . $row['setoran_id'] . '" >
//            <i class="fas fa-edit"></i>
//        </a>';
//    echo '<a id="showHafalan" type="button" class="btn btn-sm btn-outline-secondary me-1" data-bs-toggle="modal"
//       data-bs-target="#showHafalanModal" data-id="' . $row['setoran_id'] . '" >
//        <i class="fas fa-eye"></i>
//    </a>';

    // Aksi Halaman
echo '<a href="editHafalan.php?id=' . $row['setoran_id'] . '" type="button" class="btn btn-sm btn-outline-primary me-1">
        <i class="fas fa-edit"></i> 
    </a>';
echo '<a href="showHafalan.php?id=' . $row['setoran_id'] . '" type="button" class="btn btn-sm btn-outline-secondary me-1">
    <i class="fas fa-eye"></i> 
</a>';
echo "</td>";
echo "</tr>";
}

if (isset($_GET['search']) && trim($_GET['search']) !== '') {
    $search = $_GET['search'];

    // Query pencarian
    $query = "
        SELECT s.tanggal, santri.nama AS nama_santri, kelas.nama_kelas, 
               surah.nama_surah, s.ayat, s.jenis, s.skor, s.status, s.id AS setoran_id
        FROM setoran s
        JOIN santri ON s.santri_id = santri.id
        JOIN kelas ON santri.kelas_id = kelas.id
        JOIN surah ON s.surah_id = surah.id
        WHERE santri.nama LIKE :search
        ORDER BY s.tanggal DESC
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            tampilkanSetoranRow($row);
        }
    } else {
        echo "<tr><td colspan='9' class='text-center'>Tidak ada data ditemukan</td></tr>";
    }
} else {
    // Tampilkan data default (setoran terbaru)
    foreach ($setoranTerbaru as $setoran) {
        tampilkanSetoranRow($setoran);
    }
}

