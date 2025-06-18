<div class="main-content">
    <div class="row">
        <?php
        if (isset($_SESSION['success']['simpan_b'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success']['simpan_b'] . "</div>";
            unset($_SESSION['success']['simpan_b']);
        }
        ?>
        <form action="assets/config/peminjaman/add-peminjaman.php" method="post" class="col-md-8 offset-md-2">
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>
            <div class="form-group">
                <label for="judul_buku">Judul Buku:</label>
                <select class="form-control" id="penerbit" name="penerbit" required>
                    <option value="">-- Pilih Penerbit --</option>
                    <?php
                    include 'assets/config/conn.php';
                    $query = "SELECT judul FROM buku";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['judul'] . "'>" . $row['judul'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Tidak ada penerbit tersedia</option>";
                    }
                    ?>
                </select>
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
        </form>
    </div>
</div>