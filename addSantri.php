<?php
global $kelasOptions;
include_once 'handler/AddSantriHandler.php' ?>

    <!-- include header -->
<?php include_once 'partials/layouts/header.php' ?>

    <!-- Navigation -->
<?php include_once 'partials/nav.php' ?>

    <!-- Main Content -->
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Data Santri Baru</h5>
                            <a href="index.php" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formSantri" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki"
                                               value="L" checked>
                                        <label class="form-check-label" for="laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                               value="P">
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelas" class="col-sm-3 col-form-label">Kelas <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="kelas" name="kelas_id" required>
                                        <option value="" selected >-- Pilih Kelas --</option>
                                        <?php foreach ($kelasOptions as $kelas): ?>
                                            <option value="<?php echo $kelas['id']; ?>"><?php echo htmlspecialchars($kelas['nama_kelas']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_ortu" class="col-sm-3 col-form-label">Nama Orang Tua</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="no_telp" name="no_telp">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal Masuk <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="aktif"
                                               value="aktif" required checked>
                                        <label class="form-check-label" for="aktif">Aktif</label>
                                    </div>
<!--                                    <div class="form-check form-check-inline">-->
<!--                                        <input class="form-check-input" type="radio" name="status" id="lulus"-->
<!--                                               value="Lulus">-->
<!--                                        <label class="form-check-label" for="lulus">Lulus</label>-->
<!--                                    </div>-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="nonaktif"
                                               value="nonaktif">
                                        <label class="form-check-label" for="nonaktif">Non-Aktif</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                </div>
                            </div>
<!--                            <div class="mb-3">-->
<!--                                <label for="foto" class="form-label">Foto Santri</label>-->
<!--                                <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg,image/png,image/jpg">-->
<!--                                <div class="form-text">Upload foto santri (Max: 2MB, Format: JPG, JPEG, PNG)</div>-->
<!--                            </div>-->
                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan Data
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary ms-2">
                                        <i class="fas fa-undo me-1"></i> Reset Form
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error Message Handler -->
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger error-alert alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle alert-icon"></i>
                <div>
                    <h5 class="alert-heading mb-1">Terjadi Kesalahan!</h5>
                    <p class="mb-0"><?= htmlspecialchars($error_message) ?></p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- Sukses Message Handler -->
    <?php if (!empty($success_message)): ?>
        <div class="alert alert-success error-alert alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="alert-heading mb-1">Santri Berhasil Ditambahkan!</h5>
                    <p class="mb-0"><?= htmlspecialchars($success_message) ?></p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Footer -->
<?php include_once 'partials/layouts/footer.php'; ?>