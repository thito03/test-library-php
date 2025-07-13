<?php
// Include the connection file
include 'assets/config/conn.php';
// Check if the form is submitted
if ($_REQUEST['submit_pinjam']) {
    // Get the form data
    $tgl_pinjam = $_POST['tgl_pinjam'] ?? '';
    $nama_peminjam = $_POST['nama_peminjam'] ?? '';
    $judul_buku = $_POST['id_buku'] ?? '';

    // Validate the inputs
    if (empty($tgl_pinjam) || empty($nama_peminjam) || empty($judul_buku)) {
        $_SESSION['error']['pinjam'] = "Semua field harus diisi.";
        header("Location: ../../main.php?main=peminjam");
        exit();
    }

    // Insert the data into the database
    $query = "INSERT INTO peminjaman (tgl_pinjam, id_anggota, id_buku) VALUES ('$tgl_pinjam', '$nama_peminjam', '$judul_buku')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success']['pinjam'] = "Peminjaman " . $judulbuku . " dilakukan.";
        header("Location: ../../main.php?main=peminjam");
        exit();
    } else {
        $_SESSION['error']['pinjam'] = "Gagal melakukan peminjaman: " . mysqli_error($conn);
        header("Location: ../../main.php?main=peminjam");
        exit();
    }
}
?>