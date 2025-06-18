<div class="main-content">
    <div class="row">
        <form action="assets/config/databuku/add_kategori.php" method="POST" class="col-md-8 offset-md-2 mt-3">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <button type="submit" name="submit" class="btn btn-info mt-2">Simpan Kategori</button>
            <?php if (isset($_SESSION['success']['simpan_k'])) {
                echo '<div class="alert alert-success mt-3">' . $_SESSION['success']['simpan_k'] . '</div>';
            }
            unset($_SESSION['success']['simpan_k']);
            ?>
        </form>
        <div class="col-md-8 offset-md-2 mt-4">
            <h3>Daftar Kategori</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th colspan="2">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- bikin table -->
                    <?php
                    include 'assets/config/conn.php';
                    $no = 1;
                    $query = "SELECT * FROM kategori";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            print "
                            <tr>
                                <td>$no</td>
                                <td>$row[nama_kategori]</td>
                                <td><a href='?main=kategori&hapus=$row[id_kategori]' class='btn btn-danger'>hapus</a></td>
                                <td><a href='?main=kategori&edit=$row[id_kategori]' class='btn btn-warning'>ubah</a></td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        print "<tr><td colspan='3' class='text-center'>Tidak ada kategori.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- delete proses -->
            <?php
            if (isset($_GET['hapus'])) {
                $id_kategori = $_GET['hapus'];
                $delete_query = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
                if (mysqli_query($conn, $delete_query)) {
                    echo "<div class='alert alert-success'>Kategori berhasil dihapus.</div>";
                    echo "<meta http-equiv='refresh' content='2;url=?main=kategori'>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menghapus kategori.</div>";
                }
            }
            // edit proses
            if (isset($_GET['edit'])) {
                $id_kategori = $_GET['edit'];
                $edit_query = "SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
                $edit_result = mysqli_query($conn, $edit_query);
                $edit = mysqli_fetch_array($edit_result);
            ?>
                <form action="" method="POST" class="col-md-8 offset-md-2 mt-3">
                    <input type="hidden" name="id_kategori" value="<?php echo $edit['id_kategori'] ?>">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $edit['nama_kategori'] ?>" required>
                    <button type="submit" name="submit" class="btn btn-info mt-2">Simpan perubahan</button>
                </form>
            <?php
            }
            if(isset($_POST['submit'])) {
                $nama_kategori = $_POST['nama_kategori'];
                $update_query = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
                if (mysqli_query($conn, $update_query)) {
                    echo "<div class='alert alert-success'>Kategori berhasil diubah.</div>";
                    echo "<meta http-equiv='refresh' content='2;url=?main=kategori'>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah kategori.</div>";
                }
            }
            ?>
        </div>
    </div>
</div>