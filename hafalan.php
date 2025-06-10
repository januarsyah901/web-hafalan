<?php
global $setoranTerbaru;
require_once __DIR__ . '/handler/HafalanHandler.php';
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
                        <a href="index.php" class="btn btn-sm btn-outline-primary">Kembali Ke Dashboard</a>
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
                                        <?php elseif ($setoran['status'] == 'Proses') : ?>
                                            <td>
                                                <span class="fw-bold text-disable"><?php echo htmlspecialchars($setoran['skor']); ?></span>
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
                                        <?php elseif ($setoran['status'] == 'Proses') : ?>
                                            <td>
                                                <span class="badge bg-primary"><?php echo htmlspecialchars($setoran['status']); ?></span>
                                            </td>
                                        <?php else : ?>
                                            <td><?php echo htmlspecialchars($setoran['status']); ?></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="editHafalan.php?id=<?=  $setoran['setoran_id'] ?>" type="button" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="showHafalan.php?id=<?=  $setoran['setoran_id'] ?>" type="button" class="btn btn-sm btn-outline-secondary me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
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
    <!-- Navigation Page -->
    <nav class="pt-3 d-flex justify-content-center" aria-label="...">
        <ul class="pagination">
            <!-- Tombol Previous -->
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">&laquo;</a>
            </li>

            <!-- Loop Nomor Halaman -->
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <!-- Tombol Next -->
            <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">&raquo;</a>
            </li>
        </ul>
    </nav>
    <!-- Footer -->
    <!-- Footer -->
<?php include_once 'partials/layouts/footer.php'; ?>