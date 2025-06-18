<?php
session_start();

if (isset($_POST['submit'])) {
    include '../conn.php';

    $nama_penerbit = $_POST['nama_penerbit'];

    // Cek apakah penerbit sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM penerbit WHERE nama_penerbit = '$nama_penerbit'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Nama penerbit sudah ada!'); window.location='../../../main.php?main=penerbit';</script>";
        exit();
    }

    $query = "INSERT INTO penerbit (nama_penerbit) VALUES ('$nama_penerbit')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success']['simpan_p'] = "Penerbit berhasil ditambahkan.";
        header("Location: ../../../main.php?main=penerbit");
        exit();
    } else {
        header("Location: ../../../main.php?main=penerbit");
        exit();
    }
}
?>