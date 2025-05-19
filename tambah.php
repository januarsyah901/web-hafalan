<!-- Modal Tambah Santri -->
<div class="modal fade" id="tambahSantriModal" tabindex="-1" aria-labelledby="tambahSantriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSantriModalLabel">Tambah Santri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formTambahSantri">
                    <div class="mb-3">
                        <label for="namaSantri" class="form-label">Nama Santri</label>
                        <input type="text" class="form-control" id="namaSantri" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelasSantri" class="form-label">Kelas</label>
                        <select class="form-select" id="kelasSantri" required>
                            <option value="" selected disabled>Pilih Kelas</option>
                            <option value="VII-A">VII-A</option>
                            <option value="VII-B">VII-B</option>
                            <option value="VIII-A">VIII-A</option>
                            <option value="VIII-B">VIII-B</option>
                            <option value="VIII-C">VIII-C</option>
                            <option value="IX-A">IX-A</option>
                            <option value="IX-B">IX-B</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="formTambahSantri" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

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
                        <div class="col-md-6">
                            <label for="santriHafalan" class="form-label">Santri</label>
                            <select class="form-select" id="santriHafalan" required>
                                <option value="" selected disabled>Pilih Santri</option>
                                <option value="1">Putri Amelia (IX-B)</option>
                                <option value="2">Naufal Ghani (VIII-C)</option>
                                <option value="3">Rania Zahra (VII-B)</option>
                                <option value="4">Hana Qonita (VII-A)</option>
                                <option value="5">Rahmat Hakim (IX-A)</option>
                            </select>
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
                            <label for="suratHafalan" class="form-label">Surat</label>
                            <select class="form-select" id="suratHafalan" required>
                                <option value="" selected disabled>Pilih Surat</option>
                                <option value="Al-Fatihah">Al-Fatihah</option>
                                <option value="Al-Baqarah">Al-Baqarah</option>
                                <option value="Ali 'Imran">Ali 'Imran</option>
                                <option value="An-Nisa">An-Nisa</option>
                                <option value="Al-Ma'idah">Al-Ma'idah</option>
                                <option value="Al-An'am">Al-An'am</option>
                                <option value="Al-A'raf">Al-A'raf</option>
                                <option value="Al-Anfal">Al-Anfal</option>
                                <option value="At-Taubah">At-Taubah</option>
                                <option value="Yunus">Yunus</option>
                            </select>
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
                        <div class="col-md-6">
                            <label for="statusHafalan" class="form-label">Status</label>
                            <select class="form-select" id="statusHafalan" required>
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="lulus">Lulus</option>
                                <option value="perlu_diulang">Perlu Diulang</option>
                                <option value="gagal">Gagal</option>
                            </select>
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
