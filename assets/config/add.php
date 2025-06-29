<?php
// filepath: c:\xampp\htdocs\kuliah\perpustakaan\assets\config\add.php
session_start();
include 'conn.php';

// add kategori

if (isset($_POST['submit_kategori'])) {
    // Tambah kategori
    $nama_kategori = $_POST['nama_kategori'];
    $cek = mysqli_query($conn, "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Nama kategori sudah ada!'); window.location='../../main.php?main=kategori';</script>";
        exit();
    }
    $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['simpan_k'] = "Kategori berhasil ditambahkan.";
    }
    header("Location: ../../main.php?main=kategori");
    exit();
}

// Tambah penerbit

elseif (isset($_POST['submit_penerbit'])) {
    
    $nama_penerbit = $_POST['nama_penerbit'];
    $cek = mysqli_query($conn, "SELECT * FROM penerbit WHERE nama_penerbit = '$nama_penerbit'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Nama penerbit sudah ada!'); window.location='../../main.php?main=penerbit';</script>";
        exit();
    }
    $query = "INSERT INTO penerbit (nama_penerbit) VALUES ('$nama_penerbit')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['simpan_p'] = "Penerbit berhasil ditambahkan.";
    }
    header("Location: ../../main.php?main=penerbit");
    exit();
}

// proses add buku

elseif (isset($_POST['submit_buku'])) {
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
        header("Location: ../../main.php?main=inputbuku");
        exit();
    }

    $query = "INSERT INTO buku (id_buku, kode_isbn, judul, penerbit, penulis, tahun_terbit, stok, kategori, sinopsis) 
                VALUES (null, '$kode', '$judul', '$penerbit', '$penulis', '$tahun', '$stok', '$kategori', '$sinopsis')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['simpan_b'] = "Buku berhasil ditambahkan.";
        header("Location: ../../main.php?main=infobuku");
        exit();
    } else {
        $_SESSION['error']['simpan_b'] = "Gagal menambahkan buku.";
        header("Location: ../../main.php?main=infobuku");
        exit();
    }
} else {
    // Data tidak lengkap
    $_SESSION['error']['simpan'] = "Data tidak lengkap atau tidak dikenali.";
    header("Location: ../../main.php");
    exit();
}
