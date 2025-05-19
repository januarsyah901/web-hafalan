<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Santri - Sistem Manajemen Tahfidz</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.html">
            <i class="fas fa-book-quran me-2"></i>Sistem Manajemen Tahfidz
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.html"><i class="fas fa-home me-1"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="santri.html"><i class="fas fa-users me-1"></i> Santri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hafalan.html"><i class="fas fa-bookmark me-1"></i> Hafalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.html"><i class="fas fa-user-circle me-1"></i> Profil</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i> Ustadz Ahmad
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="profil.html"><i class="fas fa-id-card me-2"></i>Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Manajemen Data Santri</h1>
        <a href="santri/tambah.html" class="btn btn-primary">
            <i class="fas fa-user-plus me-1"></i> Tambah Santri
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Cari santri...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Semua Kelas</option>
                        <option value="7">Kelas VII</option>
                        <option value="8">Kelas VIII</option>
                        <option value="9">Kelas IX</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Urutkan berdasarkan</option>
                        <option value="name_asc">Nama (A-Z)</option>
                        <option value="name_desc">Nama (Z-A)</option>
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-primary w-100">
                        <i class="fas fa-filter me-1"></i> Filter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Santri Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th width="50">#</th>
                        <th>NIS</th>
                        <th>Nama Santri</th>
                        <th>Kelas</th>
                        <th>Tanggal Lahir</th>
                        <th>Total Hafalan</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>2025001</td>
                        <td>Ahmad Fauzi</td>
                        <td>VII-A</td>
                        <td>15 Januari 2010</td>
                        <td>20 surat</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td>
                            <a href="santri/1/hafalan.html" class="btn btn-sm btn-outline-info me-1" title="Lihat Hafalan">
                                <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="santri/edit/1.html" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2025002</td>
                        <td>Zahra Putri</td>
                        <td>IX-B</td>
                        <td>23 Maret 2008</td>
                        <td>37 surat</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td>
                            <a href="santri/2/hafalan.html" class="btn btn-sm btn-outline-info me-1" title="Lihat Hafalan">
                                <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="santri/edit/2.html" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2025003</td>
                        <td>Muhammad Zaki</td>
                        <td>VIII-C</td>
                        <td>11 Juni 2009</td>
                        <td>25 surat</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td>
                            <a href="santri/3/hafalan.html" class="btn btn-sm btn-outline-info me-1" title="Lihat Hafalan">
                                <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="santri/edit/3.html" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2025004</td>
                        <td>Aisyah Rahmah</td>
                        <td>VII-B</td>
                        <td>29 Desember 2010</td>
                        <td>15 surat</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td>
                            <a href="santri/4/hafalan.html" class="btn btn-sm btn-outline-info me-1" title="Lihat Hafalan">
                                <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="santri/edit/4.html" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>2025005</td>
                        <td>Umar Abdullah</td>
                        <td>IX-A</td>
                        <td>17 Mei 2008</td>
                        <td>30 surat</td>
                        <td><span class="badge bg-warning text-dark">Sakit</span></td>
                        <td>
                            <a href="santri/5/hafalan.html" class="btn btn-sm btn-outline-info me-1" title="Lihat Hafalan">
                                <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="santri/edit/5.html" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>2025006</td>
                        <td>Fatimah Azzahra</td>
                        <td>VIII-A</td>
                        <td>8 Februari 2009</td>
                        <td>22 surat</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td>
                            <a href="santri/6/hafalan.html" class="btn btn-sm btn-outline-info me-1" title="Lihat Hafalan">
                                <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="santri/edit/6.html" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <nav>
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data santri <strong id="deleteSantriName">Ahmad Fauzi</strong>? Tindakan ini tidak bisa dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger">Hapus</button>
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
</body>
</html>