<div class="main-content ">
    <?php
    include 'assets/config/conn.php';
    if (isset($_REQUEST['buku'])) {
        $id = $_REQUEST['buku'];
        $query = "SELECT gbr_buku, judul, sinopsis FROM buku WHERE kode_isbn='$id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <div class=" card-img mb-4 d-grid justify-content-center">
                <div class="card-body"><img src="upload/<?= $row['gbr_buku'] ?>" alt="" height="300"></div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $row['judul']; ?></h3>
                </div>
                <div class="card-body">
                    <p><strong>Sinopsis:</strong></p>
                    <p><?= nl2br($row['sinopsis']); ?></p>
                </div>
        <?php
        } else {
            header("Location: main.php?main=infobuku");
            exit();
        }
    } else {
        header("Location: main.php?main=infobuku");
        exit();
    }
        ?>
            </div>
</div>