<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Santri - Sistem Manajemen Tahfidz</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../dashboard.html">
            <i class="fas fa-book-quran me-2"></i>Sistem Manajemen Tahfidz
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard.html"><i class="fas fa-home me-1"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../santri.html"><i class="fas fa-users me-1"></i> Santri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../hafalan.html"><i class="fas fa-bookmark me-1"></i> Hafalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profil.html"><i class="fas fa-user-circle me-1"></i> Profil</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i> Ustadz Ahmad
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../profil.html"><i class="fas fa-id-card me-2"></i>Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../login.html"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Santri Baru</h5>
                        <a href="../santri.html" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formSantri">
                        <div class="row mb-3">
                            <label for="nis" class="col-sm-3 col-form-label">NIS <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nis" name="nis" required>
                                <div class="form-text">Nomor Induk Santri</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L" checked>
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kelas" class="col-sm-3 col-form-label">Kelas <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-select" id="kelas" name="kelas" required>
                                    <option value="" selected disabled>-- Pilih Kelas --</option>
                                    <option value="VII-A">VII-A</option>
                                    <option value="VII-B">VII-B</option>
                                    <option value="VIII-A">VIII-A</option>
                                    <option value="VIII-B">VIII-B</option>
                                    <option value="VIII-C">VIII-C</option>
                                    <option value="IX-A">IX-A</option>
                                    <option value="IX-B">IX-B</option>
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
                            <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-sm-3 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-select" id="status" name="status" required>
                                    <option value="aktif" selected>Aktif</option>
                                    <option value="nonaktif">Tidak Aktif</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Izin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="foto" name="foto">
                                <div class="form-text">Format: JPG, PNG, maksimal 2MB</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                            </div>
                        </div>
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

<!-- Footer -->
<footer class="bg-white mt-auto py-3 border-top">
    <div class="container-fluid">
        <div class="text-center text-muted">
            &copy; 2025 Sistem Manajemen Tahfidz | <a href="#" class="text-decoration-none">Panduan Penggunaan</a>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form submission
        document.getElementById('formSantri').addEventListener('submit', function(e) {
            e.preventDefault();
            // For demo purposes, show success and redirect
            alert('Data santri berhasil disimpan!');
            window.location.href = '../santri.html';
        });
    });
</script>
</body>
</html>