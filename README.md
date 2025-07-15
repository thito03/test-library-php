-- Membuat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

-- Tabel admin
CREATE TABLE admin (
    id_admin INT PRIMARY KEY,
    fullname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(50)
) ENGINE=InnoDB;

-- Tabel anggota
CREATE TABLE anggota (
    id_anggota INT PRIMARY KEY,
    nama_anggota VARCHAR(255),
    alamat_anggota TEXT,
    no_hp VARCHAR(20)
) ENGINE=InnoDB;

-- Tabel kategori
CREATE TABLE kategori (
    id_kategori INT PRIMARY KEY,
    nama_kategori VARCHAR(255)
) ENGINE=InnoDB;

-- Tabel penerbit
CREATE TABLE penerbit (
    id_penerbit INT PRIMARY KEY,
    nama_penerbit VARCHAR(255)
) ENGINE=InnoDB;

-- Tabel buku
CREATE TABLE buku (
    id_buku INT PRIMARY KEY,
    kode_isbn VARCHAR(20),
    gbr_buku VARCHAR(255),
    judul VARCHAR(255),
    penerbit VARCHAR(255),
    penulis VARCHAR(255),
    tahun_terbit YEAR,
    stok INT,
    kategori VARCHAR(255),
    sinopsis TEXT
) ENGINE=InnoDB;

-- Tabel transaksi
CREATE TABLE transaksi (
    id_peminjam INT PRIMARY KEY,
    id_anggota INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    FOREIGN KEY (id_anggota) REFERENCES anggota(id_anggota)
) ENGINE=InnoDB;

-- Tabel transaksi_buku (junction table)
CREATE TABLE transaksi_buku (
    id INT PRIMARY KEY,
    id_pinjam INT,
    id_buku INT,
    FOREIGN KEY (id_pinjam) REFERENCES transaksi(id_peminjam),
    FOREIGN KEY (id_buku) REFERENCES buku(id_buku)
) ENGINE=InnoDB;