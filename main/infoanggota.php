<div class="main-content">
    <div class="row">
        <?php
        // Koneksi ke database
        include_once 'assets/config/conn.php';

        // Ambil data anggota
        $query = "SELECT * FROM anggota";
        $result = mysqli_query($conn, $query);
        ?>
        <div class="col-md-10 offset-md-1">
            <h4 class="mb-3">Daftar Anggota</h4>
            <?php
            if (isset($_SESSION['success']['anggota_up'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['success']['anggota_up'] . "</div>";
                unset($_SESSION['success']['anggota_up']);
            } elseif (isset($_SESSION['error']['anggota'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['error']['anggota'] . "</div>";
                unset($_SESSION['error']['anggota']);
            }
            ?>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                    <td><?php echo htmlspecialchars($row['id_anggota']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_anggota']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_hp']); ?></td>
                    <td style="width: 60px;">
                        <a href='?main=infoanggota_lihat&id=<?php echo urlencode($row['id_anggota']); ?>' class='btn btn-info btn-sm p-1' title='Lihat' style="min-width: 28px;">
                        <i class='fa fa-eye'></i>
                        </a>
                    </td>
                    <td style="width: 60px;">
                        <a href='?main=inputanggota&id=<?php echo urlencode($row['id_anggota']); ?>' class='btn btn-warning btn-sm p-1' title='Edit' style="min-width: 28px;">
                        <i class='fa fa-edit'></i>
                        </a>
                    </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data anggota.</td>
                </tr>
                <?php endif; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>