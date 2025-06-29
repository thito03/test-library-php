<div class="main-content">
    <div class="row">
        <?php if (!empty($_SESSION['success']['simpan_b'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success']['simpan_b']; ?></div>
            <?php unset($_SESSION['success']['simpan_b']); ?>
        <?php endif; ?>

        <form action="assets/config/peminjaman/add-peminjaman.php" method="post" class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Pinjam:</label>
                        <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= date('d-m-Y'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam:</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali:</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-2 mb-4">Simpan</button>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Judul Buku:</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pilih</th>
                                    <th>Judul Buku</th>
                                </tr>
                            </thead>
                            <?php
                            include 'assets/config/conn.php';
                            $no = 1;
                            $result = mysqli_query($conn, "SELECT id_buku, judul FROM buku");
                            if ($result && mysqli_num_rows($result) > 0):
                                while ($row = mysqli_fetch_assoc($result)):
                            ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <input type="checkbox" name="buku[]" id="buku_<?= $no; ?>" value="<?= htmlspecialchars($row['id_buku']); ?>">
                                            </td>
                                            <td>
                                                <label for="buku_<?= $no; ?>"><?= htmlspecialchars($row['judul']); ?></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                endwhile;
                                ?>
                        </table><?php
                            else:
                                ?>
                        <div class="text-muted">Tidak ada buku tersedia</div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>