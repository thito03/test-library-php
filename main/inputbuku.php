<div class="main-content">
    <div class="row">
        <?php
        if (isset($_SESSION['success']['simpan_b'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success']['simpan_b'] . "</div>";
            unset($_SESSION['success']['simpan_b']);
        }
        ?>
        <form action="assets/config/add.php" method="post" class="col-md-8 offset-md-2">
            <div class="form-group">
            <label for="kode">Kode / ISBN:</label>
            <input type="text" class="form-control" id="kode" name="kode" required>
            </div>
            <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <select class="form-control" id="penerbit" name="penerbit" required>
                <option value="">-- Pilih Penerbit --</option>
                <?php
                include 'assets/config/conn.php';
                $query = "SELECT * FROM penerbit";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['nama_penerbit'] . "'>" . $row['nama_penerbit'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada penerbit tersedia</option>";
                }   
                ?>
            </select>
            </div>
            <div class="form-group">
            <label for="penulis">Penulis:</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>
            <div class="form-group">
            <label for="tahun">Tahun Terbit (Tahun):</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required>
            </div>
            <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <?php
                $query = "SELECT * FROM kategori";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['nama_kategori'] . "'>" . $row['nama_kategori'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada kategori tersedia</option>";
                }
                ?>
            </select>
            </div>
            <div class="form-group">
            <label for="sinopsis">Sinopsis:</label>
            <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit_buku" class="btn btn-primary mt-2 mb-4">Simpan</button>
        </form>
    </div>
</div>