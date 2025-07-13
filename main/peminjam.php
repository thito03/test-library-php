<div class="main-content">
    <div class="row">
        <?php if (!empty($_SESSION['success']['pinjam'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success']['pinjam']; ?></div>
            <?php unset($_SESSION['success']['pinjam']); ?>
        <?php endif; ?>

        <form action="assets/config/transaksi.php" method="post" class="col-md-8 offset-md-2">
            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required>
            </div>
            <div class="form-group">
                <label for="nama_peminjam">Nama Peminjam:</label>
                <select class="form-control" id="judul_buku" name="judul_buku" required>
                    <option value="" selected disabled>-- Anggota --</option>
                    <?php
                    include 'assets/config/conn.php';
                    $query = "SELECT id_anggota, nama_anggota FROM anggota";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_anggota'] . "'>" . $row['nama_anggota'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Tidak ada buku yang tersedia</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="judul_buku">Judul Buku:</label>
                <select class="form-control" id="judul_buku" name="judul_buku" required>
                    <option value="" selected disabled>-- Pilih Judul Buku --</option>
                    <?php
                    include 'assets/config/conn.php';
                    $query = "SELECT id_buku,judul FROM buku";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_buku'] . "'>" . $row['judul'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Tidak ada buku yang tersedia</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit_pinjam" class="btn btn-primary mt-2 mb-4">Simpan</button>
        </form>
    </div>
</div>