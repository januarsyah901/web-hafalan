<?php
require_once __DIR__ . '/handler/ShowSantriHandler.php';
?>
<?php include_once 'partials/layouts/header.php'?>
<?php include_once 'partials/nav.php'?>
<div class="container my-5">
    <div class="card shadow-sm border-primary">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Data Santri</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($santri['id']) ?>">

                    <div class="col-md-6">
                        <label for="nama" class="form-label text-primary">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= htmlspecialchars($santri['nama']) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="kelas" class="form-label text-primary">Kelas</label>
                        <input type="text" class="form-control" id="kelas" value="<?= htmlspecialchars($santri['nama_kelas']) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="tempat_lahir" class="form-label text-primary">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" value="<?= htmlspecialchars($santri['tempat_lahir']) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label text-primary">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir" value="<?= htmlspecialchars(date('d M Y', strtotime($santri['tanggal_lahir']))) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label text-primary">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" value="<?= htmlspecialchars($santri['jenis_kelamin']) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="no_telp" class="form-label text-primary">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telp" value="<?= htmlspecialchars($santri['no_telp']) ?>" disabled>
                    </div>

                    <div class="col-12">
                        <label for="alamat" class="form-label text-primary">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" disabled><?= htmlspecialchars($santri['alamat']) ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="nama_ortu" class="form-label text-primary">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="nama_ortu" value="<?= htmlspecialchars($santri['nama_ortu']) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_masuk" class="form-label text-primary">Tanggal Masuk</label>
                        <input type="text" class="form-control" id="tanggal_masuk" value="<?= htmlspecialchars(date('d M Y', strtotime($santri['tanggal_masuk']))) ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label text-primary">Status</label>
                        <input type="text" class="form-control" id="status" value="<?= htmlspecialchars($santri['status']) ?>" disabled>
                    </div>

                    <div class="col-12">
                        <label for="catatan" class="form-label text-primary">Catatan</label>
                        <textarea class="form-control" id="catatan" rows="3" disabled><?= !empty($santri['catatan']) ? htmlspecialchars($santri['catatan']) : ' ' ?></textarea>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <a href="editSantri.php?santri_id=<?= $santri['id'] ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit Data
                    </a>
                    <a href="santri.php" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once 'partials/layouts/footer.php'?>
