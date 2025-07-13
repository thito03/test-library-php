<?php
include 'assets/config/conn.php';
$query = "SELECT * FROM buku";
$result = mysqli_query($conn, $query);
?>
<div class="main-content">
    <div class="row">
        <!-- [Invoices Awaiting Payment] start -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-success">
                                <i class="feather-book text-white"></i>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-dark"><span class="counter">45</span></div>
                                <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Buku Di Perpustakaan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [Invoices Awaiting Payment] start -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-info">
                                <i class="feather-users text-white"></i>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-dark"><span class="counter">45</span></div>
                                <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Anggota Di Perpustakaan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [Invoices Awaiting Payment] start -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-warning">
                                <i class="feather-shopping-bag text-white"></i>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-dark"><span class="counter">45</span></div>
                                <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Peminjam Buku</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [Invoices Awaiting Payment] start -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-danger">
                                <i class="feather-alert-triangle text-white"></i>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-dark"><span class="counter">45</span></div>
                                <h3 class="fs-13 fw-semibold text-truncate-1-line">Telat Pengambilan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [Conversion Rate] end -->

    </div>
</div>