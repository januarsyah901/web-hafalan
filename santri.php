<?php
global $pdo;


// hafalan.php
session_start();
require_once 'env/config.php'; // file ini berisi koneksi ke database menggunakan $pdo

// Ambil semua data setoran dari database
$stmt = $pdo->query("    SELECT s.nama, k.nama_kelas FROM santri AS s JOIN kelas AS k ON s.kelas_id = k.id ORDER BY k.nama_kelas DESC");
$santri = $stmt->fetchAll();
//var_dump($santri);
?>
    <!-- include header -->
<?php include_once 'partials/layouts/header.php' ?>

    <!-- Navigation -->
<?php include_once 'partials/nav.php'?>
    <!-- Main Content -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Setoran Hafalan Terbaru</h5>
                        <a href="dashboard.php" class="btn btn-sm btn-outline-primary">Kembali Ke Dashboard</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Nama Santri</th>
                                    <th>Kelas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($santri as $s) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($s['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($s['nama_kelas']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!-- Footer -->
<?php include_once 'partials/layouts/footer.php'; ?>