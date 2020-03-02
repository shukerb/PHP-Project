<?php
//destroy sessions
session_start();
session_unset();
session_destroy();

//destroy cookies
setcookie("Email", time() - 3600);
setcookie("Password", time() - 3600);
header('location: ../index.php');
?>