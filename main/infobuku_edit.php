<?php
if (!isset($_REQUEST['edit'])) {
    header('location:?main=infobuku.php');
} else {
    include 'assets/config/conn.php';
    $id = $_REQUEST['edit'];
    $sql = "SELECT * FROM buku WHERE id_buku=$id";
    $data = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($data);
    //variabel
    $kode = $row['kode_isbn'];
    $gambar = $row['gbr_buku'];
    $judul = $row['judul'];
    $penerbit = $row['penerbit'];
    $penulis = $row['penulis'];
    $tahun = $row['tahun_terbit'];
    $stok = $row['stok'];
    $kategori = $row['kategori'];
    $sinopsis = $row['sinopsis'];
}
?>

<div class="main-content">
    <div class="row">
        <form action="assets/config/edit.php" method="post" class="col-md-8 offset-md-2" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kode">Kode / ISBN:</label>
                <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode ?>" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <?php if (!empty($gambar)): ?>
                    <div class="mb-2">
                        <img src="upload/<?= htmlspecialchars($gambar) ?>" alt="Gambar Buku" style="max-width:120px;max-height:120px;">
                        <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar) ?>">
                    </div>
                <?php endif; ?>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            </div>
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $judul ?>" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <select class="form-control" id="penerbit" name="penerbit" required>
                    <option value="<?= $penerbit ?>" selected><?= $penerbit ?></option>
                    <?php

                    $query = "SELECT * FROM penerbit";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($penerbit != $row['nama_penerbit']) {
                                echo "<option value='" . $row['nama_penerbit'] . "'>" . $row['nama_penerbit'] . "</option>";
                            }
                        } 
                    } else {
                        echo "<option value=''>Tidak ada penerbit tersedia</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $penulis ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Terbit (Tahun):</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $tahun ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= $stok ?>" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="<?= $kategori ?>" selected><?= $kategori ?></option>
                    <?php
                    $query = "SELECT * FROM kategori";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($kategori != $row['nama_kategori']) {
                                # code...
                                echo "<option  value='" . $row['nama_kategori'] . "'>" . $row['nama_kategori'] . "</option>";
                            }
                        }
                    } else {
                        echo "<option value=''>Tidak ada kategori tersedia</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis:</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required>="<?= $sinopsis ?></textarea>
            </div>
            <button type="submit" name="submit_buku" class="btn btn-primary mt-2 mb-4">Simpan</button>
        </form>
    </div>
</div>