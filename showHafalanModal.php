<?php
global $row;
$mode = 'preview'; // Default mode
include_once 'handler/ShowHafalanHandler.php';

?>
<div class="modal fade" id="showHafalanModal" tabindex="-1" aria-labelledby="showHafalanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="showHafalanModalLabel">
                    <i class="fas fa-book-open me-2"></i>Detail Setoran Hafalan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body bg-light" id="modalContent">
                <!-- Loading indicator -->
                <div class="text-center py-4" id="loadingIndicator">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-3 fw-semibold text-muted">Memuat data setoran hafalan...</p>
                </div>

                <!-- Content will be populated via JavaScript -->
                <div id="setoranDetail" style="display: none;">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold text-primary">Informasi Santri</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td class="fw-semibold text-muted">Nama</td>
                                    <td class="text-primary" id="namaSantri">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-muted">Kelas</td>
                                    <td class="text-primary" id="kelasName">-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold text-primary">Informasi Setoran</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td class="fw-semibold text-muted">Tanggal</td>
                                    <td class="text-primary" id="tanggalSetoran">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-muted">Status</td>
                                    <td id="statusSetoran">
                                        <span class="badge bg-secondary">-</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h6 class="fw-bold text-primary">Detail Hafalan</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td class="fw-semibold text-muted" width="20%">Surah</td>
                                    <td id="namaSurah">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-muted">Jenis</td>
                                    <td id="jenisSetoran">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-muted">Ayat</td>
                                    <td id="ayatSetoran">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-muted">Skor</td>
                                    <td>
                                        <span id="skorSetoran" class="badge bg-success">-</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row" id="catatanRow" style="display: none;">
                        <div class="col-md-12">
                            <h6 class="fw-bold text-primary">Catatan</h6>
                            <div class="alert alert-info" id="catatanSetoran">
                                -
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error message -->
                <div id="errorMessage" class="alert alert-danger d-none">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span id="errorText"></span>
                </div>
            </div>

            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
