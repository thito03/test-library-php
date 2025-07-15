<div class="main-content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Data Transaksi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id_pinjam</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Jumlah Buku Pinjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'assets/config/conn.php';
                            $sql = "SELECT t.id_peminjam, a.nama_anggota, t.tanggal_pinjam, t.tanggal_kembali,
                                COUNT(tb.id) AS jumlah_buku
                                FROM transaksi t
                                JOIN anggota a ON t.id_anggota = a.id_anggota
                                LEFT JOIN transaksi_buku tb ON t.id_peminjam = tb.id_pinjam
                                GROUP BY t.id_peminjam
                                ORDER BY t.id_peminjam DESC";
                            $data = mysqli_query($conn, $sql);
                            $data = mysqli_query($conn, $sql);
                            $no = 1;
                            while ($ary = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $ary['id_peminjam'] ?></td>
                                    <td><?= $ary['nama_anggota'] ?></td>
                                    <td><?= $ary['tanggal_pinjam'] ?></td>
                                    <td><?= ($ary['tanggal_kembali'] == '0' || $ary['tanggal_kembali'] == '' || is_null($ary['tanggal_kembali']) || $ary['tanggal_kembali'] == '0000-00-00') ? '-' : $ary['tanggal_kembali'] ?>
                                    <td><?= $ary['jumlah_buku'] ?></td>
                                    </td>
                                    <td class="text-center d-flex justify-content-center gap-3">
                                        <?php
                                        $isBelumKembali = in_array($ary['tanggal_kembali'], ['0', '', null, '0000-00-00']);
                                        if ($isBelumKembali): ?>
                                            <a href="?main=pengambilan&id_transaksi=<?= $ary['id_peminjam'] ?>"
                                                class="btn btn-sm btn-danger" style="min-width: 28px;"><i class='fas fa-reply'></i></a>
                                        <?php else: ?>
                                            <button class="btn btn-success" style="min-width: 28px;"><i class='fas fa-clipboard-check'></i></button>
                                        <?php endif; ?>
                                        <a href="?main=transaksi_buku_i&id_transaksi=<?= $ary['id_peminjam'] ?>"
                                            class="btn btn-sm btn-info" style="min-width: 28px;"><i class='fa fa-eye'></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>