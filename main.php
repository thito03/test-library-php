<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: log/auth-login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include('components/head.php'); ?>
</head>

<body>
    <?php include('components/nav.php'); ?>
    <?php include('components/header.php'); ?>
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <?php include('components/page-header.php'); ?>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <?php include 'main/'.$_REQUEST['main'].'.php'; ?>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <?php include 'components/footer.php'; ?>
        <!-- [ Footer ] end -->
    </main>
    
    <?php include 'components/scripts.php'; ?>
</body>

</html>