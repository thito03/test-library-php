<?php
$id_transaksi = $_GET['id_transaksi'] ?? null;
$buku_dipilih = $_SESSION['buku_dipilih'] ?? [];
?>

<div class="main-content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Peminjaman Buku</h5>
                <h6>Transaksi ID: <?= $id_transaksi ?></h6>
            </div>
            <div class="card-body">
                <div>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['err'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['err']['judulbuku'] ?? '' ?>
                        </div>
                        <?php unset($_SESSION['err']); ?>
                    <?php endif; ?>
                </div>
                <form action="assets/config/transaksi.php" method="post">
                    <div class="form-group mb-3">
                        <label for="anggota">judul</label>
                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                        <select name="judulbuku" id="anggota" class="form-control">
                            <option value="" disabled selected>-- Pilih judul --</option>
                            <?php
                            include "assets/config/conn.php";
                            $sqlSelect = "SELECT * FROM buku order by judul asc";
                            $data = mysqli_query($conn, $sqlSelect);
                            while ($ary = mysqli_fetch_array($data)) {
                                echo '<option value="' . $ary['id_buku'] . '">' . htmlentities($ary['judul']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" name="pinjam_buku" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Buku yang dipinjam</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($buku_dipilih as $index => $id_buku) {
                            $query = "SELECT judul FROM buku WHERE id_buku = '$id_buku'";
                            $hasil = mysqli_query($conn, $query);
                            $ary = mysqli_fetch_array($hasil);
                        ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $ary['judul'] ?></td>
                                <td>
                                    <form action="assets/config/delete.php" method="post">
                                        <input type="hidden" name="id" value="<?= $index ?>">
                                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                        <button type="submit" name="d_peminjaman_buku" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <form action="assets/config/transaksi.php" method="post">
                    <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                    <button class="btn btn-success" type="submit_" name="peminjaman_buku">Simpan</button>
                </form>
            </div>
        </div>
    </div>