<div class="main-content">
    <div class="row">
        <?php
        if (isset($_SESSION['success']['simpan_b'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success']['simpan_b'] . "</div>";
            unset($_SESSION['success']['simpan_b']);
        }
        if (isset($_SESSION['error']['simpan_b'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error']['simpan_b'] . "</div>";
            unset($_SESSION['error']['simpan_b']);
        }
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Penerbit</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Sinopsis</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'assets/config/conn.php';
                $no = 1;
                $query = "SELECT * FROM buku";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        print "
                            <tr>
                                <td>$no</td>
                                <td>$row[kode_isbn]</td>
                                <td>$row[judul]</td>
                                <td>$row[penerbit]</td>
                                <td>$row[penulis]</td>
                                <td>$row[tahun_terbit]</td>
                                <td>$row[stok]</td>
                                <td>$row[kategori]</td>
                                <td>$row[sinopsis]</td>
                            </tr>";
                        $no++;
                    }
                } else {
                    print "<tr><td colspan='3' class='text-center'>Tidak ada kategori.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>