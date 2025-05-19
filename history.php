<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Hafalan - Sistem Manajemen Hafalan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .bg-light-green {
            background-color: #e8f5e9;
        }
        .page-header {
            background-color: #43a047;
            color: white;
            padding: 1.5rem 0;
            margin-bottom: 2rem;
        }
        .card-header {
            background-color: #f1f8e9;
        }
        .btn-success {
            background-color: #43a047;
            border-color: #388e3c;
        }
        .btn-success:hover {
            background-color: #388e3c;
            border-color: #2e7d32;
        }
        .badge-ziyadah {
            background-color: #4caf50;
            color: white;
        }
        .badge-murajaah {
            background-color: #2196f3;
            color: white;
        }
        .status-lulus {
            color: #4caf50;
        }
        .status-perbaikan {
            color: #ff9800;
        }
        .status-mengulang {
            color: #f44336;
        }
        .filters-card {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="bg-light">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem Manajemen Hafalan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/santri">Santri</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownHafalan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hafalan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownHafalan">
                        <li><a class="dropdown-item active" href="/hafalan">Riwayat Hafalan</a></li>
                        <li><a class="dropdown-item" href="/hafalan/tambah">Input Hafalan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/laporan">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Riwayat Hafalan</h1>
                <p class="lead">Daftar seluruh hafalan yang sudah disetorkan</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="/hafalan/tambah" class="btn btn-light"><i class="fas fa-plus-circle me-1"></i> Input Hafalan Baru</a>
                <div class="btn-group ms-2">
                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="exportExcel"><i class="fas fa-file-excel me-2"></i>Excel</a></li>
                        <li><a class="dropdown-item" href="#" id="exportPDF"><i class="fas fa-file-pdf me-2"></i>PDF</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mb-5">
    <!-- Filters -->
    <div class="card filters-card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Filter Hafalan</h5>
        </div>
        <div class="card-body">
            <form id="filterForm" class="row g-3">
                <div class="col-md-4">
                    <label for="filterSantri" class="form-label">Santri</label>
                    <select class="form-select" id="filterSantri" name="santri_id">
                        <option value="">Semua Santri</option>
                        <option value="1">Ahmad Farhan</option>
                        <option value="2">Fatimah Azzahra</option>
                        <option value="3">Muhammad Haikal</option>
                        <option value="4">Aisyah Putri</option>
                        <option value="5">Zaid Ibrahim</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filterJenis" class="form-label">Jenis Hafalan</label>
                    <select class="form-select" id="filterJenis" name="jenis_hafalan">
                        <option value="">Semua Jenis</option>
                        <option value="ziyadah">Ziyadah</option>
                        <option value="murajaah">Murajaah</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Rentang Tanggal</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="filterTanggalMulai" name="tanggal_mulai">
                        <span class="input-group-text">hingga</span>
                        <input type="date" class="form-control" id="filterTanggalSelesai" name="tanggal_selesai">
                    </div>
                </div>
                <div class="col-md-12 text-end">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter me-1"></i> Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hafalan Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Santri</th>
                        <th>Surat & Ayat</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Skor</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="/santri/1/hafalan">Ahmad Farhan</a></td>
                        <td>Al-Baqarah: 1-5</td>
                        <td><span class="badge rounded-pill badge-ziyadah">Ziyadah</span></td>
                        <td>17 Mei 2025</td>
                        <td>8</td>
                        <td><span class="fw-bold status-lulus">Lulus</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/hafalan/edit/1" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="1"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="/santri/2/hafalan">Fatimah Azzahra</a></td>
                        <td>Al-Baqarah: 6-10</td>
                        <td><span class="badge rounded-pill badge-ziyadah">Ziyadah</span></td>
                        <td>17 Mei 2025</td>
                        <td>9</td>
                        <td><span class="fw-bold status-lulus">Lulus</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/hafalan/edit/2" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="2"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="/santri/3/hafalan">Muhammad Haikal</a></td>
                        <td>Al-Fatihah: 1-7</td>
                        <td><span class="badge rounded-pill badge-murajaah">Murajaah</span></td>
                        <td>16 Mei 2025</td>
                        <td>7</td>
                        <td><span class="fw-bold status-perbaikan">Lulus dengan Perbaikan</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/hafalan/edit/3" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="3"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="/santri/4/hafalan">Aisyah Putri</a></td>
                        <td>Ali 'Imran: 1-10</td>
                        <td><span class="badge rounded-pill badge-ziyadah">Ziyadah</span></td>
                        <td>15 Mei 2025</td>
                        <td>5</td>
                        <td><span class="fw-bold status-mengulang">Perlu Mengulang</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/hafalan/edit/4" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="4"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><a href="/santri/2/hafalan">Fatimah Azzahra</a></td>
                        <td>Al-Baqarah: 1-5</td>
                        <td><span class="badge rounded-pill badge-murajaah">Murajaah</span></td>
                        <td>15 Mei 2025</td>
                        <td>10</td>
                        <td><span class="fw-bold status-lulus">Lulus</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/hafalan/edit/5" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="5"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><a href="/santri/5/hafalan">Zaid Ibrahim</a></td>
                        <td>An-Nisa: 1-10</td>
                        <td><span class="badge rounded-pill badge-ziyadah">Ziyadah</span></td>
                        <td>14 Mei 2025</td>
                        <td>8</td>
                        <td><span class="fw-bold status-lulus">Lulus</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/hafalan/edit/6" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="6"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</main>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data hafalan ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Sistem Manajemen Hafalan</h5>
                <p>Memudahkan pengelolaan hafalan Al-Qur'an para santri</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p>&copy; 2025 Sistem Manajemen Hafalan. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- Custom Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Delete Modal
        let deleteId = null;
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            deleteId = button.getAttribute('data-id');
        });

        document.getElementById('confirmDelete').addEventListener('click', function() {
            // Here you would send a delete request to your backend
            alert(`Hafalan dengan ID ${deleteId} telah dihapus.`);
            // Close modal and refresh page in a real app
            const bsModal = bootstrap.Modal.getInstance(deleteModal);
            bsModal.hide();
        });

        // Handle Export buttons
        document.getElementById('exportExcel').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Mengekspor data hafalan ke Excel...');
            // Implement export functionality
        });

        document.getElementById('exportPDF').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Mengekspor data hafalan ke PDF...');
            // Implement export functionality
        });

        // Filter form handling
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Filter diterapkan!');
            // Implement filtering logic
        });

        document.getElementById('filterForm').addEventListener('reset', function() {
            // Clear all filters and reset the table
            setTimeout(() => {
                alert('Filter telah direset!');
            }, 100);
        });
    });
</script>
</body>
</html>