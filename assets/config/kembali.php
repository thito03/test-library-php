<?php
include "conn.php";
$id_transaksi = $_GET['id_transaksi'] ?? null;
$tgl_kembali = $_GET['tanggal_kembali'] ?? null;
$quary = "UPDATE transaksi SET tanggal_kembali = '$tgl_kembali' WHERE transaksi. id_peminjam = '$id_transaksi'";
$data = mysqli_query($conn, $quary);
if ($data) {
    echo "<script>alert('Pengembalian buku berhasil!'); window.location.href='?main=transaksi_d';</script>";
} else {
    echo "<script>alert('Pengembalian buku gagal!'); window.location.href='?main=transaksi_d';</script>";
}
?>