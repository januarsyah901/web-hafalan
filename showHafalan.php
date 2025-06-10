<?php
global $pdo, $hafalan;
include_once 'handler/ShowHafalanHandler.php'; // Asumsi file ini mengambil data $hafalan
?>

<?php include_once 'partials/layouts/header.php' ?>

<?php include_once 'partials/nav.php' ?>

    <div class="container my-4">

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm border-primary">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detail Hafalan</h4>
                <a href="santri.php" class="btn btn-sm btn-outline-light">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <input type="hidden" name="id" value="<?= $hafalan['id'] ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label text-primary">Tanggal</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars(date('d M Y', strtotime($hafalan['tanggal']))) ?>" disabled>
                        <input type="hidden" name="tanggal" value="<?= $hafalan['tanggal'] ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="santri_id" class="form-label text-primary">Santri</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars($hafalan['nama_santri']) ?> (<?= htmlspecialchars($hafalan['nama_kelas']) ?>)" disabled>
                        <input type="hidden" name="santri_id" value="<?= $hafalan['santri_id'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="surah_id" class="form-label text-primary">Surah</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars($hafalan['nama_surah']) ?>" disabled>
                        <input type="hidden" name="surah_id" value="<?= $hafalan['surah_id'] ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-primary">Ayat</label>
                        <div class="input-group">
                            <?php
                            $ayatRange = explode('-', $hafalan['ayat']);
                            $ayatMulai = $ayatRange[0] ?? '';
                            $ayatAkhir = $ayatRange[1] ?? $ayatMulai;
                            ?>
                            <input type="number" class="form-control" id="ayatMulai" placeholder="Ayat awal"
                                   value="<?= htmlspecialchars($ayatMulai) ?>" min="1" disabled>
                            <span class="input-group-text">sampai</span>
                            <input type="number" class="form-control" id="ayatAkhir" placeholder="Ayat akhir"
                                   value="<?= htmlspecialchars($ayatAkhir) ?>" min="1" disabled>
                            <input type="hidden" name="ayatValue" id="ayatValue"
                                   value="<?= htmlspecialchars($hafalan['ayat']) ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="jenis" class="form-label text-primary">Jenis Hafalan</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars($hafalan['jenis']) ?>" disabled>
                        <input type="hidden" name="jenis" value="<?= $hafalan['jenis'] ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label text-primary">Skor</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($hafalan['skor']) ?>" disabled>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label text-primary">Status</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($hafalan['status']) ?>" disabled>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-primary">Catatan</label>
                    <textarea class="form-control" rows="3" disabled><?= !empty($hafalan['catatan']) ? htmlspecialchars($hafalan['catatan']) : ' ' ?></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="editHafalan.php?id=<?= $hafalan['id'] ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </div>
            </div> </div> </div>

<?php include_once 'partials/layouts/footer.php' ?>