<?php
session_start();

if (isset($_POST['submit'])) {
    include '../conn.php';

    $nama_kategori = $_POST['nama_kategori'];

    // Cek apakah kategori sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Nama kategori sudah ada!'); window.location='../../../main.php?main=kategori';</script>";
        exit();
    }

    $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success']['simpan_k'] = "Kategori berhasil ditambahkan.";
        header("Location: ../../../main.php?main=kategori");
        exit();
    } else {
        header("Location: ../../../main.php?main=kategori");
        exit();
    }
}
?>