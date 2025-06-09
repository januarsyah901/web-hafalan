<?php
global $pdo;
include_once 'handler/showHafalanHandler.php';
?>

<?php include_once 'partials/layouts/header.php' ?>

<?php include_once 'partials/nav.php' ?>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Hafalan</h2>
            <a href="index.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
            <input type="hidden" name="id" value="<?= $hafalan['id'] ?>">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" class="form-control"
                           value="<?= htmlspecialchars(date('d M Y', strtotime($hafalan['tanggal']))) ?>" disabled>
                    <input type="hidden" name="tanggal" value="<?= $hafalan['tanggal'] ?>">
                </div>

                <div class="col-md-6">
                    <label for="santri_id" class="form-label">Santri</label>
                    <select class="form-select" name="santri_id" id="santri_id" disabled>
                        <option>
                            <?= htmlspecialchars($hafalan['nama_santri']) ?>
                            (<?= htmlspecialchars($hafalan['nama_kelas']) ?>)
                        </option>
                    </select>
                    <input type="hidden" name="santri_id" value="<?= $hafalan['santri_id'] ?>">

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="surah_id" class="form-label">Surah</label>
                    <select class="form-select" name="surah_id_disabled" id="surah_id" disabled>
                        <option>
                            <?= htmlspecialchars($hafalan['nama_surah']) ?>
                        </option>
                    </select>
                    <input type="hidden" name="surah_id" value="<?= $hafalan['surah_id'] ?>">

                </div>

                <div class="col-md-6">
                    <label class="form-label">Ayat</label>
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
                    <label for="jenis" class="form-label">Jenis Hafalan</label>
                    <select class="form-select" id="jenis" name="jenis_disabled" disabled>
                        <option value="Ziyadah" <?= ($hafalan['jenis'] == 'Ziyadah') ? 'selected' : '' ?>>Ziyadah
                        </option>
                        <option value="Murajaah" <?= ($hafalan['jenis'] == 'Murajaah') ? 'selected' : '' ?>>Murajaah
                        </option>
                    </select>
                    <input type="hidden" name="jenis" value="<?= $hafalan['jenis'] ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Skor</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($hafalan['skor']) ?>" disabled>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" disabled>
                        <option <?= ($hafalan['status'] == 'Lulus') ? 'selected' : '' ?>>Lulus</option>
                        <option <?= ($hafalan['status'] == 'Perlu diulang') ? 'selected' : '' ?>>Perlu diulang</option>
                        <option <?= ($hafalan['status'] == 'Gagal') ? 'selected' : '' ?>>Gagal</option>
                        <option <?= ($hafalan['status'] == 'Proses') ? 'selected' : '' ?>>Proses</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Catatan</label>
                <textarea class="form-control" rows="3" disabled><?= !empty($hafalan['catatan']) ? htmlspecialchars($hafalan['catatan']) : '' ?></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <a href="editHafalan.php?id=<?= $hafalan['id'] ?>" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
            </div>
    </div>


<?php include_once 'partials/layouts/footer.php' ?>