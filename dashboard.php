<?php
// include DashboardHandler.php
require_once 'handler/DashboardHandler.php';
global $totalSantri;
global $hafalanMingguIni;
global $ziyadahBulanIni;
global $murajaahBulanIni;
global $setoranTerbaru;
global $totalData;
global $totalPages;
global $page;
//var_dump($hafalanMingguIni);
?>
<!-- include header -->
<?php include_once 'partials/layouts/header.php' ?>

<!-- Navigation -->
<?php include_once 'partials/nav.php'?>


<!-- Main Content -->
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Dashboard</h1>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#inputHafalanModal">
                    <i class="bi bi-journal-plus"></i> Input Hafalan
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSantriModal">
                    <i class="bi bi-person-plus"></i> Tambah Santri
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                        <i class="fas fa-users text-primary fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="card-title text-muted mb-0">Total Santri</h6>
                        <h2 class="mt-2"><?php echo $totalSantri ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                        <i class="fas fa-bookmark text-success fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="card-title text-muted mb-0">Hafalan Minggu Ini</h6>
                        <h2 class="mt-2"><?php echo $hafalanMingguIni ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3">
                        <i class="fas fa-book-open text-info fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="card-title text-muted mb-0">Ziyadah Bulan Ini</h6>
                        <h2 class="mt-2"><?php echo $ziyadahBulanIni ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                        <i class="fas fa-sync-alt text-warning fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="card-title text-muted mb-0">Murajaah Bulan Ini</h6>
                        <h2 class="mt-2"><?php echo $murajaahBulanIni ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Submissions -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Setoran Hafalan Terbaru</h5>
                    <a href="hafalan.php" class="btn btn-sm btn-outline-primary">Lihat Semua</a>

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
                                        <td><span class="badge bg-info"><?php echo htmlspecialchars($setoran['jenis']); ?></span></td>
                                    <?php elseif ($setoran['jenis'] == 'Murajaah') : ?>
                                        <td><span class="badge bg-primary text-white"><?php echo htmlspecialchars($setoran['jenis']); ?></span></td>
                                    <?php else : ?>
                                        <td><?php echo htmlspecialchars($setoran['jenis']); ?></td>
                                    <?php endif; ?>

                                    <!-- Skor Column with conditional styling -->
                                    <?php if ($setoran['status'] == 'Lulus') : ?>
                                        <td><span class="fw-bold text-success"><?php echo htmlspecialchars($setoran['skor']); ?></span></td>
                                    <?php elseif ($setoran['status'] == 'Perlu diulang') : ?>
                                        <td><span class="fw-bold text-warning"><?php echo htmlspecialchars($setoran['skor']); ?></span></td>
                                    <?php elseif ($setoran['status'] == 'Gagal') : ?>
                                        <td><span class="fw-bold text-danger"><?php echo htmlspecialchars($setoran['skor']); ?></span></td>
                                    <?php else : ?>
                                        <td><?php echo htmlspecialchars($setoran['skor']); ?></td>
                                    <?php endif; ?>

                                    <!-- Status Column with conditional styling -->
                                    <?php if ($setoran['status'] == 'Lulus') : ?>
                                        <td><span class="badge bg-success"><?php echo htmlspecialchars($setoran['status']); ?></span></td>
                                    <?php elseif ($setoran['status'] == 'Perlu diulang') : ?>
                                        <td><span class="badge bg-warning text-dark"><?php echo htmlspecialchars($setoran['status']); ?></span></td>
                                    <?php elseif ($setoran['status'] == 'Gagal') : ?>
                                        <td><span class="badge bg-danger"><?php echo htmlspecialchars($setoran['status']); ?></span></td>
                                    <?php else : ?>
                                        <td><?php echo htmlspecialchars($setoran['status']); ?></td>
                                    <?php endif; ?>


                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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

    </div>
</div>
<!-- Modal -->
<?php include_once 'tambah.php' ?>

<!-- Footer -->
<?php include_once 'partials/layouts/footer.php'; ?>