<div class="main-content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Transaksi</h5>
            </div>
            <div class="card-body">
                <form action="assets/config/transaksi.php" method="post">
                    <div class="form-group mb-3">
                        <label for="anggota">Pilih Anggota</label>
                        <select name="anggota" id="anggota" class="form-control">
                            <option value="" disabled selected>-- Pilih Anggota --</option>
                            <?php
                            include 'assets/config/conn.php';
                            $query = "SELECT * FROM anggota";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id_anggota']}'>{$row['nama_anggota']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" name="tanggalpinjam" id="tanggal_pinjam" class="form-control" required>
                    </div>
                    <div>
                        <button type="submit" name="submit_pinjam" value="Pinjam" class="btn btn-primary mt-2">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>