<?php
session_start();
session_destroy();
header("location: ../../log/auth-login.php");
?>