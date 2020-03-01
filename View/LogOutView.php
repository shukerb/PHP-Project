<?php
//destroy sessions
session_start();
session_unset();
session_destroy();
//destroy cookies

header('location: ../Index.php');
?>