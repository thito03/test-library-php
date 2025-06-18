<?php
session_start();
include '../conn.php';
if (isset($_POST['submit'])) {
    $kode = $_POST['kode'] ?? '';
    $judul = $_POST['judul'] ?? '';
    $penerbit = $_POST['penerbit'] ?? '';
    $penulis = $_POST['penulis'] ?? '';
    $tahun = $_POST['tahun'] ?? '';
    $stok = $_POST['stok'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $sinopsis = $_POST['sinopsis'] ?? '';

    $cek_data = mysqli_query($conn, "SELECT * FROM buku WHERE kode_isbn = '$kode'");
    if (mysqli_num_rows($cek_data) > 0) {
        $_SESSION['error']['simpan_b'] = "Buku dengan kode ISBN tersebut sudah ada.";
        header("Location: ../../../main.php?main=inputbuku");
        exit();
    }

    $query = "INSERT INTO buku (id_buku,kode_isbn,judul,penerbit,penulis,tahun_terbit,stok,kategori,sinopsis) 
                VALUES (null, '$kode', '$judul', '$penerbit', '$penulis', '$tahun', '$stok', '$kategori', '$sinopsis')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['simpan_b'] = "Buku berhasil ditambahkan.";
        header("Location: ../../../main.php?main=infobuku");
        exit();
    } else {
        $_SESSION['error']['simpan_b'] = "Gagal menambahkan buku.";
        header("Location: ../../../main.php?main=infobuku");
        exit();
    }
} else {
    $_SESSION['error']['simpan_b'] = "Data tidak lengkap.";
    header("Location: ../../../main.php?main=infobuku");
    exit();
}
