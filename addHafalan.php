<?php global $santri, $surah;
include_once 'handler/AddHafalanHandler.php'?>
<!-- Modal Input Hafalan -->
<div class="modal fade" id="inputHafalanModal" tabindex="-1" aria-labelledby="inputHafalanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputHafalanModalLabel">Input Hafalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formInputHafalan">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="santriDropdown" class="form-label">Santri</label>
                            <div class="dropdown">
                                <button class="form-select text-start" type="button" id="santriDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span id="santriSelected">Pilih Santri...</span>
                                </button>
                                <ul class="dropdown-menu w-100" style="max-height: 250px; overflow-y: auto;">
                                    <li>
                                        <input type="text" class="form-control" id="santriSearch" placeholder="Cari santri..."  >
                                    </li>
                                    <div id="santriList">
                                        <?php foreach ($santri as $s): ?>
                                            <li>
                                                <button class="dropdown-item" type="button" data-value="<?= $s['id'] ?>">
                                                    <?= htmlspecialchars($s['nama']) ?>
                                                </button>
                                            </li>
                                        <?php endforeach; ?>
                                    </div>
                                </ul>
                            </div>
                            <input type="hidden" id="santriValue" name="santri_id">
                        </div>
                        <div class="col-md-6">
                            <label for="jenisHafalan" class="form-label">Jenis Hafalan</label>
                            <select class="form-select" id="jenisHafalan" required>
                                <option value="" selected disabled>Pilih Jenis</option>
                                <option value="ziyadah">Ziyadah (Hafalan Baru)</option>
                                <option value="murajaah">Murajaah (Mengulang)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="surahDropdown" class="form-label">Surah</label>
                            <div class="dropdown">
                                <button class="form-select text-start" type="button" id="surahDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span id="surahSelected">Pilih Surah...</span>
                                </button>
                                <ul class="dropdown-menu w-100" style="max-height: 250px; overflow-y: auto;">
                                    <li>
                                        <input type="text" class="form-control" id="surahSearch" placeholder="Cari surah...">
                                    </li>
                                    <div id="surahList">
                                        <?php foreach ($surah as $s): ?>
                                            <li>
                                                <button class="dropdown-item" type="button" data-value="<?= $s['id'] ?>">
                                                    <?= htmlspecialchars($s['nama_surah']) ?>
                                                </button>
                                            </li>
                                        <?php endforeach; ?>
                                    </div>
                                </ul>
                            </div>
                            <input type="hidden" id="surahValue" name="surah_id" >
                        </div>
                        <div class="col-md-6">
                            <label for="ayatHafalan" class="form-label">Ayat</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="ayatMulai" placeholder="Dari" required>
                                <span class="input-group-text">-</span>
                                <input type="number" class="form-control" id="ayatAkhir" placeholder="Sampai" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="skorHafalan" class="form-label">Skor (0-100)</label>
                            <input type="number" class="form-control" id="skorHafalan" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatanHafalan" class="form-label">Catatan (Opsional)</label>
                        <textarea class="form-control" id="catatanHafalan" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="formInputHafalan" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>
