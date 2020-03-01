<?php
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();
//get the user from the login page
$user = unserialize($_SESSION['user']);
//get the ID of the user
$userID=$user->getID();
//delete the user from the DB
$controller=new UserController();
$controller->DeleteUser($userID);
header('location:LogOutView.php');
?>