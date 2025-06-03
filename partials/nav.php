<?php include_once 'handler/NavHandler.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-book-quran me-2"></i>Sistem Manajemen Tahfidz
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>" href="index.php">
                        <i class="fas fa-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'santri.php' ? 'active' : '' ?>" href="santri.php">
                        <i class="fas fa-users me-1"></i> Santri
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'hafalan.php' ? 'active' : '' ?>" href="hafalan.php">
                        <i class="fas fa-bookmark me-1"></i> Hafalan
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle <?= $currentPage == 'profil.php' ? 'active' : '' ?>" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i> <?= $_SESSION['nama'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="handler/LogoutHandler.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
