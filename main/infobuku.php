<div class="main-content">
    <div class="row">
        <?php
        if (isset($_SESSION['success']['buku'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success']['buku'] . "</div>";
        }
        if (isset($_SESSION['error']['buku'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error']['buku'] . "</div>";
        }
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Gambar</th>
                    <th>Judul Buku</th>
                    <th>Penerbit</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Sinopsis</th>
                    <th colspan="2">action</th>
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
                                <td><img src='upload/$row[gbr_buku]'height='100' ></td>
                                <td>$row[judul]</td>
                                <td>$row[penerbit]</td>
                                <td>$row[penulis]</td>
                                <td>$row[tahun_terbit]</td>
                                <td>$row[stok]</td>
                                <td>$row[kategori]</td>
                                <td><a href='?main=infobuku_sinopsis&buku=$row[kode_isbn]'>baca...</a></td>
                                <td>
                                    <a href='assets/config/delete.php?h_buku=$row[id_buku]' class='btn btn-danger' title='Hapus'>
                                        <i class='fa fa-trash'></i>
                                    </a>
                                </td>
                                <td>
                                    <a href='?main=infobuku_edit&edit=$row[id_buku]' class='btn btn-warning' title='Ubah'>
                                        <i class='fa fa-edit'></i>
                                    </a>
                                </td>
                            </tr>";
                        $no++;
                    }
                } else {
                    print "<tr><td colspan='10' class='text-center'>Tidak ada kategori.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <form action="" method="post">

        </form>
    </div>
</div>