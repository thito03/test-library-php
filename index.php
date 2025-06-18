<?php
if(isset($_SESSION['login'])) {
    header('Location: main.php');
    exit();
}
header('location: log/auth-login.php');
exit();