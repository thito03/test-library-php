<?php
include 'conn.php';
session_start();

//delete kategori

if (isset($_GET['h_kategori'])) {
    $id = $_GET['h_kategori'];
    $query = "DELETE FROM kategori WHERE id_kategori='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['error']['kategori'] = "Kategori berhasil dihapus.";
        header("Location: ../../main.php?main=kategori");
    } else {
        $_SESSION['error']['kategori'] = "Gagal menghapus data" . mysqli_error($conn);
    }
}

// Delete penerbit

elseif (isset($_GET['h_penerbit'])) {
    $id = $_GET['h_penerbit'];
    $query = "DELETE FROM penerbit WHERE id_penerbit='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['error']['penerbit'] = "Penerbit berhasil dihapus.";
        header("Location: ../../main.php?main=penerbit");
    } else {
        $_SESSION['error']['penerbit'] = "Gagal menghapus data" . mysqli_error($conn);
    }
}

// Delete buku

elseif (isset($_GET['h_buku'])) {
    $id = $_GET['h_buku'];
    $query = "DELETE FROM buku WHERE id_buku='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['error']['buku'] = "Buku berhasil dihapus.";
        header("Location: ../../main.php?main=infobuku");
    } else {
        $_SESSION['error']['buku'] = "Gagal menghapus data" . mysqli_error($conn);
    }
}

// Delete buku peminjaman

elseif (isset($_GET['d_peminjaman_buku'])) {
    $index = $_POST['id'];
    $id_transaksi = $_POST['id_transaksi'];

    // Hapus item di index tertentu dari session
    if (isset($_SESSION['buku_dipilih'][$index])) {
        unset($_SESSION['buku_dipilih'][$index]);
        $_SESSION['buku_dipilih'] = array_values($_SESSION['buku_dipilih']);
    }

    // Kembali ke form setelah hapus
    header("Location:../main.php?main=transaksi_buku&id_transaksi=$id_transaksi");
    exit;
} 

else {
    $_SESSION['error']['h'] = "Tidak ada data yang dihapus.";
    header("Location: ../../main.php?main=dashboard");
}
