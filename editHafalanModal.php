<?php include_once 'handler/EditHafalanHandler.php' ?>
<!-- Modal Edit/Preview Hafalan -->
<div class="modal fade" id="editHafalanModal" tabindex="-1" aria-labelledby="editHafalanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHafalanModalLabel">
                    Edit Hafalan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditHafalan" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Santri</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($row['nama_santri']) ?>" disabled>
                            <input type="hidden" name="santri_id" value="<?= $row['santri_id'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="jenisHafalanEdit" class="form-label">Jenis Hafalan</label>
                            <select class="form-select" id="jenisHafalanEdit" name="jenis_hafalan" required>
                                <option value="Ziyadah" <?= $row['jenis'] === 'Ziyadah' ? 'selected' : '' ?>>Ziyadah (Hafalan Baru)</option>
                                <option value="Murajaah" <?= $row['jenis'] === 'Murajaah' ? 'selected' : '' ?>>Murajaah (Mengulang)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Surah</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($hafalan['nama_surah']) ?>" disabled>
                            <input type="hidden" name="surah_id" value="<?= $hafalan['surah_id'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ayat</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="ayat_mulai" value="<?= $hafalan['ayat_mulai'] ?>" placeholder="Dari" <?= $mode === 'preview' ? 'disabled' : '' ?> required>
                                <span class="input-group-text">-</span>
                                <input type="number" class="form-control" name="ayat_akhir" value="<?= $hafalan['ayat_akhir'] ?>" placeholder="Sampai" <?= $mode === 'preview' ? 'disabled' : '' ?> required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatanHafalanEdit" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatanHafalanEdit" name="catatan" rows="3" <?= $mode === 'preview' ? 'disabled' : '' ?>><?= htmlspecialchars($hafalan['catatan']) ?></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <?php if ($mode === 'edit'): ?>
                    <button type="submit" form="formEditHafalan" class="btn btn-primary">Simpan Perubahan</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>