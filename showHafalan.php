<?php
global $pdo;
include_once 'handler/ShowHafalanHandler.php';
?>

<?php include_once 'partials/layouts/header.php'?>

<?php include_once 'partials/nav.php'?>

<div class="container mt-4">
    <h2>Detail Hafalan</h2>
    <form>
        <fieldset disabled>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" value="<?= htmlspecialchars(date('d M Y', strtotime($hafalan['tanggal']))) ?>">
            </div>
            <div class="mb-3">
                <label for="santri" class="form-label">Santri</label>
                <input type="text" class="form-control" id="santri" value="<?= htmlspecialchars($hafalan['nama_santri']) ?>">
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" value="<?= htmlspecialchars($hafalan['nama_kelas']) ?>">
            </div>
            <div class="mb-3">
                <label for="surah" class="form-label">Surah</label>
                <input type="text" class="form-control" id="surah" value="<?= htmlspecialchars($hafalan['nama_surah']) ?>">
            </div>
            <div class="mb-3">
                <label for="ayat" class="form-label">Ayat</label>
                <input type="text" class="form-control" id="ayat" value="<?= htmlspecialchars($hafalan['ayat']) ?>">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Hafalan</label>
                <input type="text" class="form-control" id="jenis" value="<?= htmlspecialchars($hafalan['jenis']) ?>">
            </div>
            <div class="mb-3">
                <label for="skor" class="form-label">Skor</label>
                <input type="text" class="form-control" id="skor" value="<?= htmlspecialchars($hafalan['skor']) ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" value="<?= htmlspecialchars($hafalan['status']) ?>">
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" id="catatan" rows="3"><?= htmlspecialchars($hafalan['catatan']) ?></textarea>
            </div>
        </fieldset>
    </form>
</div>


<?php include_once 'partials/layouts/footer.php'?>
