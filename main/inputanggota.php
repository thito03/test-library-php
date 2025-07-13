<?php
if (isset($_GET['id'])) {
    $edit_mode = true;
    include 'assets/config/conn.php';
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM anggota WHERE id_anggota = '$id'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $id_anggota = htmlspecialchars($row['id_anggota']);
        $nama_anggota = htmlspecialchars($row['nama_anggota']);
        $alamat_anggota = htmlspecialchars($row['alamat_anggota']);
        $no_hp = htmlspecialchars($row['no_hp']);
    } else {
        echo "<div class='alert alert-danger'>Data anggota tidak ditemukan.</div>";
        exit();
    }
}
?>

<div class="main-content">
    <div class="row">
        <?php
        if (isset($_SESSION['success']['anggota'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success']['anggota'] . "</div>";
            unset($_SESSION['success']['anggota']);
        }
        elseif (isset($_SESSION['error']['anggota'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error']['anggota'] . "</div>";
            unset($_SESSION['error']['anggota']);
        }
        ?>
        <form action="assets/config/<?= isset($edit_mode) ? 'edit.php' : 'add.php' ?>" method="post" class="col-md-8 offset-md-2">
            <div class="form-group">
                <label for="id">ID Anggota:</label>
                <input type="text" class="form-control" id="id" name="id" <?php if(isset($id_anggota)) { echo 'value="'.$id_anggota.'"'; } ?> required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" <?php if(isset($nama_anggota)) { echo 'value="'.$nama_anggota.'"'; } ?> required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" required><?php if(isset($alamat_anggota)) { echo $alamat_anggota; } ?></textarea>
            </div>
            <div class="form-group">
                <label for="hp">No. HP:</label>
                <input type="text" class="form-control" id="hp" name="hp" <?php if(isset($no_hp)) { echo 'value="'.$no_hp.'"'; } ?> required>
            </div>
            <button type="submit" name="submit_anggota" class="btn btn-primary mt-2 mb-4">Simpan</button>
        </form>
    </div>
</div>