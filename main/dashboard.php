<?php
include 'assets/config/conn.php';
$query = "SELECT 
    (SELECT COUNT(id_buku) FROM buku) AS total_buku,
    (SELECT COUNT(id_anggota) FROM anggota) AS total_anggota";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
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
                                <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $data['total_buku'] ?></span></div>
                                <h3 class="fs-13 fw-semibold">judul </h3>
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
                                <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $data['total_anggota'] ?></span></div>
                                <h3 class="fs-13 fw-semibold">Anggota </h3>
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
                                <h3 class="fs-13 fw-semibold">Buku dipinjam</h3>
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
                                <h3 class="fs-13 fw-semibold">Telat Pengambilan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [Conversion Rate] end -->

    </div>
</div>