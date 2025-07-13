<?php
$email = $_POST['email'];
$pass = $_POST['password'];

// Validasi email ganda
include('conn.php');
$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'";
$result = mysqli_query($conn, $sql);

session_start();

//sucsess login
if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = true;
    $row = mysqli_fetch_array($result);
    if ($row['role'] == 'admin') {
        $_SESSION['job'] = '<span class="badge bg-soft-success text-success ms-1">admin</span>';
    } else {
        $_SESSION['job'] = '<span class="badge bg-soft-info text-info ms-1">pegawai</span>';
    }
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['email'] = $row['email'];
    header('Location: ../../main.php?main=dashboard');
    exit();
} else {
    // Validasi email dan password
    $_SESSION['err']['salah'] = 'Email atau Password salah!';
    header('Location: ../../log/auth-login.php');
    exit();
}
?>