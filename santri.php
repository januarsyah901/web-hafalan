<?php
global $pdo;
require_once 'handler/SantriHandler.php'
?>
    <!-- include header -->
<?php include_once 'partials/layouts/header.php' ?>

    <!-- Navigation -->
<?php include_once 'partials/nav.php' ?>

    <!-- Main Content -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: none;">
                        <h1 class="h3">Data seluruh santri</h1>
                        <a href="index.php" class="btn btn-sm btn-outline-primary">Kembali Ke Dashboard</a>
                    </div>
                    <div class=" m-4">
                        <div class="card-body">
                            <form action="" method="GET" class="mb-0">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-lg"
                                           placeholder="Cari nama santri..."
                                           value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                                <div class="form-text">Masukkan nama santri untuk mencari data santri</div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Nama Santri</th>
                                    <th>Kelas</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Orang Tua</th>
                                    <th>No Telp</th>
                                    <th>Tanggal Masuk</th>
                                    <th>setatus</th>
                                    <th>catatan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php include_once 'handler/SearchAndShowSantriHandler.php'; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
<?php include_once 'partials/layouts/footer.php'; ?>