<?php
global $santri, $kelasOptions;
require_once __DIR__ . '/handler/ShowSantriHandler.php';
?>
<?php include_once 'partials/layouts/header.php' ?>
<?php include_once 'partials/nav.php' ?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Edit Data Santri</h5>
                        <a href="santri.php" class="btn btn-sm btn-outline-light">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <?= htmlspecialchars($_SESSION['error_message']); unset($_SESSION['error_message']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <?= htmlspecialchars($_SESSION['success_message']); unset($_SESSION['success_message']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form id="formEditSantri" method="post" action="handler/EditSantriHandler.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($santri['id']) ?>">

                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama"
                                       value="<?= htmlspecialchars($santri['nama']) ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label text-muted">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                       value="<?= htmlspecialchars($santri['tempat_lahir']) ?>" disabled>
                                <input type="hidden" name="tempat_lahir" value="<?= htmlspecialchars($santri['tempat_lahir']) ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label text-muted">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                       value="<?= htmlspecialchars($santri['tanggal_lahir']) ?>" disabled>
                                <input type="hidden" name="tanggal_lahir" value="<?= htmlspecialchars($santri['tanggal_lahir']) ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki"
                                           value="L" <?= ($santri['jenis_kelamin'] == 'L') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                           value="P" <?= ($santri['jenis_kelamin'] == 'P') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kelas" class="col-sm-3 col-form-label">Kelas <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-select" id="kelas" name="kelas_id" required>
                                    <option value="" selected disabled>-- Pilih Kelas --</option>
                                    <?php foreach ($kelasOptions as $kelas): ?>
                                        <option value="<?php echo $kelas['id']; ?>" <?= ($santri['kelas_id'] == $kelas['id']) ? 'selected' : '' ?>>
                                            <?php echo htmlspecialchars($kelas['nama_kelas']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                          placeholder="Alamat lengkap santri..."><?= htmlspecialchars($santri['alamat']) ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_ortu" class="col-sm-3 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu"
                                       value="<?= htmlspecialchars($santri['nama_ortu']) ?>"
                                       placeholder="Nama lengkap orang tua/wali...">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="no_telp" name="no_telp"
                                       value="<?= htmlspecialchars($santri['no_telp']) ?>"
                                       placeholder="Contoh: 081234567890">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_masuk" class="col-sm-3 col-form-label text-muted">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                       value="<?= htmlspecialchars($santri['tanggal_masuk']) ?>" disabled>
                                <input type="hidden" name="tanggal_masuk" value="<?= htmlspecialchars($santri['tanggal_masuk']) ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="aktif"
                                           value="aktif" <?= ($santri['status'] == 'aktif') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="aktif">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="nonaktif"
                                           value="nonaktif" <?= ($santri['status'] == 'nonaktif') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="nonaktif">Non-Aktif</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="catatan" id="catatan" rows="3" ><?= !empty($santri['catatan']) ? htmlspecialchars($santri['catatan']) : ' ' ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 offset-sm-3 d-flex justify-content-start mt-3">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                                <a href="showSantri.php?santri_id=<?= htmlspecialchars($santri['id']) ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'partials/layouts/footer.php' ?><?php
