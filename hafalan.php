<?php
// include DashboardHandler.php
global $pdo;

session_start();

require_once 'env/config.php'; // file ini berisi koneksi ke database menggunakan $pdo

// Ambil semua data setoran dari database
$stmt = $pdo->query("    SELECT s.tanggal, santri.nama AS nama_santri, kelas.nama_kelas, 
           surah.nama_surah, s.ayat, s.jenis, s.skor, s.status
    FROM setoran s
    JOIN santri ON s.santri_id = santri.id
    JOIN kelas ON santri.kelas_id = kelas.id
    JOIN surah ON s.surah_id = surah.id
    ORDER BY s.tanggal DESC");
$setoranTerbaru = $stmt->fetchAll();

?>
    <!-- include header -->
<?php include_once 'partials/layouts/header.php' ?>

    <!-- Navbar -->
<?php include_once 'partials/nav.php' ?>
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
                                    <th>Tanggal</th>
                                    <th>Nama Santri</th>
                                    <th>Kelas</th>
                                    <th>Surat</th>
                                    <th>Ayat</th>
                                    <th>Jenis</th>
                                    <th>Skor</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--                            <tr>-->
                                <!--                                <td>15 Mei 2025</td>-->
                                <!--                                <td>Umar Abdullah</td>-->
                                <!--                                <td>IX-A</td>-->
                                <!--                                <td>Ar-Rahman</td>-->
                                <!--                                <td>1-30</td>-->
                                <!--                                <td><span class="badge bg-warning text-dark">Murajaah</span></td>-->
                                <!--                                <td><span class="fw-bold text-danger">65</span></td>-->
                                <!--                                <td><span class="badge bg-danger">Gagal</span></td>-->
                                <!--                                <td>-->
                                <!--                                    <a href="#" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>-->
                                <!--                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>-->
                                <!--                                </td>-->
                                <!--                            </tr>-->
                                <?php foreach ($setoranTerbaru as $setoran) : ?>
                                    <tr>
                                        <td><?php echo date('d M Y', strtotime($setoran['tanggal'])); ?></td>
                                        <td><?php echo htmlspecialchars($setoran['nama_santri']); ?></td>
                                        <td><?php echo htmlspecialchars($setoran['nama_kelas']); ?></td>
                                        <td><?php echo htmlspecialchars($setoran['nama_surah']); ?></td>
                                        <td><?php echo htmlspecialchars($setoran['ayat']); ?></td>

                                        <!-- Jenis Column with conditional styling -->
                                        <?php if ($setoran['jenis'] == 'Ziyadah') : ?>
                                            <td>
                                                <span class="badge bg-info"><?php echo htmlspecialchars($setoran['jenis']); ?></span>
                                            </td>
                                        <?php elseif ($setoran['jenis'] == 'Murajaah') : ?>
                                            <td>
                                                <span class="badge bg-primary text-white"><?php echo htmlspecialchars($setoran['jenis']); ?></span>
                                            </td>
                                        <?php else : ?>
                                            <td><?php echo htmlspecialchars($setoran['jenis']); ?></td>
                                        <?php endif; ?>

                                        <!-- Skor Column with conditional styling -->
                                        <?php if ($setoran['status'] == 'Lulus') : ?>
                                            <td>
                                                <span class="fw-bold text-success"><?php echo htmlspecialchars($setoran['skor']); ?></span>
                                            </td>
                                        <?php elseif ($setoran['status'] == 'Perlu diulang') : ?>
                                            <td>
                                                <span class="fw-bold text-warning"><?php echo htmlspecialchars($setoran['skor']); ?></span>
                                            </td>
                                        <?php elseif ($setoran['status'] == 'Gagal') : ?>
                                            <td>
                                                <span class="fw-bold text-danger"><?php echo htmlspecialchars($setoran['skor']); ?></span>
                                            </td>
                                        <?php else : ?>
                                            <td><?php echo htmlspecialchars($setoran['skor']); ?></td>
                                        <?php endif; ?>

                                        <!-- Status Column with conditional styling -->
                                        <?php if ($setoran['status'] == 'Lulus') : ?>
                                            <td>
                                                <span class="badge bg-success"><?php echo htmlspecialchars($setoran['status']); ?></span>
                                            </td>
                                        <?php elseif ($setoran['status'] == 'Perlu diulang') : ?>
                                            <td>
                                                <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($setoran['status']); ?></span>
                                            </td>
                                        <?php elseif ($setoran['status'] == 'Gagal') : ?>
                                            <td>
                                                <span class="badge bg-danger"><?php echo htmlspecialchars($setoran['status']); ?></span>
                                            </td>
                                        <?php else : ?>
                                            <td><?php echo htmlspecialchars($setoran['status']); ?></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1"><i
                                                        class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-secondary"><i
                                                        class="fas fa-eye"></i></a>
                                        </td>
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