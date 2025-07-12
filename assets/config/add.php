<?php
session_start();
include 'conn.php';

// tambah kategori

if (isset($_POST['submit_kategori'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $cek = mysqli_query($conn, "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Nama kategori sudah ada!'); window.location='../../main.php?main=kategori';</script>";
        exit();
    }
    $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['kategori'] = "Kategori berhasil ditambahkan.";
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
        $_SESSION['success']['penerbit'] = "Penerbit berhasil ditambahkan.";
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

    //mengubah file gambar dulu
    $gambar = $_FILES['gambar']['name']; //nama-gambar.JPEG
    $extension = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
    $random_nama_gbr = md5(date('m/d/Y h:i:s a', time())) . "." . $extension;
    $folder = "../../upload/";
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $folder . $random_nama_gbr);

    //cek ISBN
    $cek_data = mysqli_query($conn, "SELECT * FROM buku WHERE kode_isbn = '$kode'");
    if (mysqli_num_rows($cek_data) > 0) {
        $_SESSION['error']['buku'] = "Buku dengan kode ISBN tersebut sudah ada.";
        header("Location: ../../main.php?main=inputbuku");
        exit();
    }

    //memasukkan ke database
    $query = "INSERT INTO buku (id_buku, kode_isbn, gbr_buku, judul, penerbit, penulis, tahun_terbit, stok, kategori, sinopsis) 
                VALUES (null, '$kode', '$random_nama_gbr', '$judul', '$penerbit', '$penulis', '$tahun', '$stok', '$kategori', '$sinopsis')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['buku'] = "Buku berhasil ditambahkan.";
        header("Location: ../../main.php?main=inputbuku");
        exit();
    } else {
        $_SESSION['error']['buku'] = "Gagal menambahkan buku.";
        header("Location: ../../main.php?main=inputbuku");
        exit();
    }
}

// proses pinjam

elseif (isset($_POST['submit_pinjam'])) {
    $tgl_pinjam = $_POST['tgl_pinjam'] ?? '';
    $nama_peminjam = $_POST['nama_peminjam'] ?? '';
    $tanggal_kembali = $_POST['tanggal_kembali'] ?? '';
    $buku = $_POST['id_buku'];

    foreach ($buku as $id_buku) {
        $query = "INSERT INTO peminjaman (id_peminjaman, tgl_pinjam, nama_peminjam, tanggal_kembali, id_buku) 
                    VALUES (null, '$tgl_pinjam', '$nama_peminjam', '$tanggal_kembali', '$id_buku')";
        mysqli_query($conn, $query);
    }

    $_SESSION['success']['pinjam'] = "Peminjaman berhasil disimpan.";
    header("Location: ../../main.php?main=peminjam");
    exit();
}

// Data tidak lengkap

else {
    $_SESSION['error']['add'] = "Data tidak lengkap atau tidak dikenali.";
    header("Location: ../../main.php?main=dashboard");
    exit();
}
