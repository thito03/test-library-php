<?php
include 'assets/config/conn.php';
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM anggota WHERE id_anggota = '$id'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
    } else {
        exit();
    }
} else {
    exit();
}
?>

<div class="main-content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Detail Anggota</h4>
            </div>
            <div class="card-body">
                <p><strong>ID Anggota:</strong> <?php echo htmlspecialchars($row['id_anggota']); ?></p>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($row['nama_anggota']); ?></p>
                <p><strong>Alamat:</strong> <?php echo htmlspecialchars($row['alamat_anggota']); ?></p>
                <p><strong>No. HP:</strong> <?php echo htmlspecialchars($row['no_hp']); ?></p>
            </div>
        </div>
    </div>
</div>