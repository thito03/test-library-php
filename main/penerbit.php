<div class="main-content">
    <div class="row">
        <form action="assets/config/add.php" method="POST" class="col-md-8 offset-md-2 mt-3">
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit:</label>
                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" required>
            </div>
            <button type="submit" name="submit_penerbit" class="btn btn-info mt-2">Simpan Penerbit</button>
            <?php if (isset($_SESSION['success']['penerbit'])) {
                echo '<div class="alert alert-success mt-3">' . $_SESSION['success']['penerbit'] . '</div>';
            }
            if (isset($_SESSION['error']['penerbit'])) {
                echo '<div class="alert alert-danger mt-3">' . $_SESSION['error']['penerbit'] . '</div>';
            }
            unset($_SESSION['success']);
            unset($_SESSION['error']);
            ?>
        </form>
        <div class="col-md-8 offset-md-2 mt-4">
            <h3>Daftar Penerbit</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penerbit</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'assets/config/conn.php';
                    $no = 1;
                    $query = "SELECT * FROM penerbit";  
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            print "
                            <tr>
                                <td>$no</td>
                                <td>$row[nama_penerbit]</td>
                                <td><a href='assets/config/delete.php?h_penerbit=$row[id_penerbit]' class='btn btn-danger'>hapus</a></td>
                                <td><a href='?main=kategori&edit=$row[id_penerbit]' class='btn btn-warning'>ubah</a></td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        print "<tr><td colspan='4' class='text-center'>Tidak ada penerbit.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            // edit proses
            if (isset($_GET['edit'])) {
                $id_penerbit = $_GET['edit'];
                $edit_query = "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'";
                $edit_result = mysqli_query($conn, $edit_query);
                $edit = mysqli_fetch_array($edit_result);
            ?>
                <form action="" method="POST" class="col-md-8 offset-md-2 mt-3">
                    <input type="hidden" name="id_penerbit" value="<?php echo $edit['id_penerbit'] ?>">
                    <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="<?php echo $edit['nama_penerbit'] ?>" required>
                    <button type="submit" name="submit_edit" class="btn btn-info mt-2">Simpan perubahan</button>
                </form>
            <?php
            }
            if(isset($_POST['submit_edit'])) {
                $id_penerbit = $_POST['id_penerbit'];
                $nama_penerbit = $_POST['nama_penerbit'];
                $update_query = "UPDATE penerbit SET nama_penerbit='$nama_penerbit' WHERE id_penerbit='$id_penerbit'";
                if (mysqli_query($conn, $update_query)) {
                    echo "<div class='alert alert-success'>Penerbit berhasil diubah.</div>";
                    echo "<meta http-equiv='refresh' content='2;url=?main=penerbit'>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah penerbit.</div>";
                }
            }
            ?>
        </div>
    </div>
</div>