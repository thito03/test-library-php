<?php
include('conn.php');

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$pass_confirm = $_POST['pass_confirm'];
$role = $_POST['job'];

session_start();

// Validasi password
if ($password != $pass_confirm) {
    $_SESSION['err']['no_same'] = "Password confirmation tidak sama.";
    header('location:../../log/auth-register.php');
    exit();
}

// Validasi email ganda
$sql = "SELECT * FROM admin WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['err']['ada'] = 'Email sudah terdaftar!';
    header('Location: ../../log/auth-register.php');
    exit();
}
$_SESSION['cek']['admin'] = 'kamu mendaftar sebagai admin';
$sql = "INSERT INTO admin (fullname, email, password, role) VALUES ('$fullname', '$email', '$password', '$role')";

mysqli_query($conn, $sql);
header('Location: ../../log/auth-register.php');
exit();
