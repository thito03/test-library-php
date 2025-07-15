<?php

// transaksi anggota

if (isset($_POST['submit_pinjam'])) {
    $tanggalpinjam = $_POST['tanggalpinjam'];
    $anggota = $_POST['anggota'];
    session_start();

    include "conn.php";
    $sqlCreate = "INSERT INTO transaksi (id_peminjam, id_anggota, tanggal_pinjam, tanggal_kembali) VALUES(null, '$anggota', '$tanggalpinjam', null)";
    mysqli_query($conn, $sqlCreate);
    $id_transaksi = mysqli_insert_id($conn);
    $_SESSION['buku_dipilih'] = [];
    header("location:../../main.php?main=transaksi_buku&id_transaksi=$id_transaksi");
    exit();
}

// transaksi buku

elseif (isset($_POST['pinjam_buku'])) {
    session_start();
    include "conn.php";

    $id_transaksi = $_POST['id_transaksi'];
    $id_buku = $_POST['judulbuku'];

    if (!isset($_SESSION['buku_dipilih'])) {
        $_SESSION['buku_dipilih'] = [];
    }

    // Cek apakah buku sudah dipilih
    if (in_array($id_buku, $_SESSION['buku_dipilih'])) {
        // Ambil judul buku untuk pesan
        $getJudul = mysqli_fetch_array(mysqli_query($conn, "SELECT judul FROM buku WHERE id_buku = '$id_buku'"));
        $_SESSION['err']['judulbuku'] = "Buku \"" . $getJudul['judul'] . "\" sudah dipinjam!";
        header("Location: ../../main.php?main=transaksi_buku&id_transaksi=$id_transaksi");
        exit();
    }

    // Tambahkan buku ke sesi
    $_SESSION['buku_dipilih'][] = $id_buku;
    $_SESSION['success'] = "Buku berhasil ditambahkan.";
    header("Location: ../../main.php?main=transaksi_buku&id_transaksi=$id_transaksi");
    exit();
}

// Simpan peminjaman buku

elseif (isset($_POST['peminjaman_buku'])) {
    session_start();
    include 'conn.php';

    $id_transaksi = $_POST['id_transaksi'];
    $buku_dipilih = $_SESSION['buku_dipilih'] ?? [];

    foreach ($buku_dipilih as $id_buku) {
        mysqli_query($conn, "INSERT INTO transaksi_buku (id_pinjam, id_buku) VALUES ('$id_transaksi', '$id_buku')");
    }

    // Kosongkan session
    unset($_SESSION['buku_dipilih']);
    header("Location: ../../main.php?main=transaksi_d");
}
