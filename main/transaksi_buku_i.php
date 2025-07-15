<?php
include "assets/config/conn.php";

$id_transaksi = $_GET['id_transaksi'] ?? '';

$sql = "SELECT b.kode_isbn, b.gbr_buku, b.judul, b.penerbit, b.penulis, b.tahun_terbit, b.stok, b.kategori, b.sinopsis
        FROM transaksi_buku tb
        JOIN buku b ON tb.id_buku = b.id_buku
        WHERE tb.id_pinjam = '$id_transaksi'";

$data = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Buku yang dipinjam</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode/ISBN</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Penerbit</th>
                            <th>Penulis</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Sinopsis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($buku = mysqli_fetch_array($data)) {
                            echo "<tr>
                        <td>$no</td>
                        <td>{$buku['kode_isbn']}</td>
                        <td><img src='upload/{$buku['gbr_buku']}' width='80' alt='Gambar Buku'></td>
                        <td>{$buku['judul']}</td>
                        <td>{$buku['penerbit']}</td>
                        <td>{$buku['penulis']}</td>
                        <td>{$buku['tahun_terbit']}</td>
                        <td>{$buku['stok']}</td>
                        <td>{$buku['kategori']}</td>
                        <td>{$buku['sinopsis']}</td>
                    </tr>";
                            $no++;
                        }
                        if (mysqli_num_rows($data) == 0) {
                            echo "<tr><td colspan='10' class='text-center'>Tidak ada data buku.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>