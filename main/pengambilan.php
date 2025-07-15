<?php
include "assets/config/conn.php";
$id_transaksi = $_GET['id_transaksi'] ?? null;

// Cek valid
if (!$id_transaksi) {
    echo "ID Transaksi tidak ditemukan!";
    exit;
}

// Ambil data transaksi
$query = "SELECT * FROM transaksi WHERE id_peminjam = '$id_transaksi'";
$data = mysqli_query($conn, $query);
$transaksi = mysqli_fetch_array($data);

if (!$transaksi) {
    echo "Data transaksi tidak ditemukan.";
    exit;
}
?>

<div class="main-content">
    <div class="row">
        <div class="card">
            <div class="card-body p-5">
                <h3>Form Pengembalian Buku</h3>

                <form method="POST" action="assets/config/kembali.php">
                    <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_peminjam'] ?>">
                    <div class="form-group mb-3">
                        <label>Tanggal Pinjam:</label>
                        <input type="date" name="tanggalpinjam"
                            class="form-control"
                            value="<?= $transaksi['tanggal_pinjam'] ?>" readonly>
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp">
                            <?= $_SESSION['err']['nama'] ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Kembali:</label>
                        <input type="date" name="tanggal_kembali" class="form-control" required>
                    </div>
                    <div>
                        <button type="submit" name="kembali" class="btn btn-primary">Simpan Pengembalian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>