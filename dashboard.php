<?php
// include DashboardHandler.php
require_once 'handler/DashboardHandler.php';
global $totalSantri, $hafalanMingguIni, $ziyadahBulanIni, $murajaahBulanIni, $setoranTerbaru, $totalData, $totalPages, $page, $pdo;
//var_dump($hafalanMingguIni);
?>

    <!-- Header -->
<?php include_once 'partials/layouts/header.php' ?>

    <!-- Navbar -->
<?php include_once 'partials/nav.php' ?>


    <!-- Main Content -->
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 ">
            <h1 class="h3">Dashboard</h1>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                            data-bs-target="#inputHafalanModal">
                        <i class="bi bi-journal-plus"></i> Input Hafalan
                    </button>
                    <a type="button" class="btn btn-primary" href="addSantri.php">
                        <i class="bi bi-person-plus"></i> Tambah Santri
                    </a>
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

        <!-- Search Bar -->
        <div class=" m-4">
            <div class="card-body">
                <form action="" method="GET" class="mb-0">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-lg"
                               placeholder="Cari nama santri..."
                               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                    <div class="form-text">Masukkan nama santri untuk mencari data hafalan</div>
                </form>
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
                                <!-- Hasil Pencarian dan Data Hafalan -->
                                <?php include_once 'handler/SearchAndShowHafalanHandler.php';?>
                                </tbody>
                            </table>
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
        </div>
    </div>

    <!-- Modal -->
<?php include_once 'addHafalan.php' ?>

    <!-- Footer -->
<?php include_once 'partials/layouts/footer.php'; ?>