<?php
include 'conn.php';
session_start();

//edit buku
if (isset($_POST['submit_buku'])) {
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

    //update data buku di database
    $query = "UPDATE buku SET 
                kode_isbn = '$kode',
                gbr_buku = '$random_nama_gbr',
                judul = '$judul',
                penerbit = '$penerbit',
                penulis = '$penulis',
                tahun_terbit = '$tahun',
                stok = '$stok',
                kategori = '$kategori',
                sinopsis = '$sinopsis'
            WHERE kode_isbn = '$kode'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['buku'] = "Buku berhasil diupdate.";
        header("Location: ../../main.php?main=inputbuku");
        exit();
    } else {
        $_SESSION['error']['buku'] = "Gagal mengupdate buku.";
        header("Location: ../../main.php?main=inputbuku");
        exit();
    }
}

//edit anggota
elseif (isset($_POST['submit_anggota'])) {
    $id = $_POST['id'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $hp = $_POST['hp'] ?? '';

    //update data anggota di database
    $query = "UPDATE anggota SET 
                nama_anggota = '$nama',
                alamat_anggota = '$alamat',
                no_hp = '$hp'
            WHERE id_anggota = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success']['anggota_up'] = "Anggota berhasil diupdate.";
        header("Location: ../../main.php?main=infoanggota");
        exit();
    } else {
        $_SESSION['error']['anggota_up'] = "Gagal mengupdate anggota.";
        header("Location: ../../main.php?main=inputanggota");
        exit();
    }
} else {
    header("Location: ../../main.php?main=inputanggota");
}
