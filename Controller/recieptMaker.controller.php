<?php
require_once('../pdfMaker.php');
require_once('../Model/UserModel.php');
$mypdfMaker= new pdfMaker();
$user = unserialize($_SESSION['user']);
$userName=$user->getFirstName();
$mypdfMaker->Receipt($userName,$_SESSION['LastPayment']);
