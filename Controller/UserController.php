<?php
require_once('DBconnection.php');
require_once('../Model/UserModel.php');
class UserController{

    function AddUser($user)
    {
        $firstName= escape_this_string($user->getFirstName());
        $lastName= escape_this_string($user->getLastName());
        $password=password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $email=escape_this_string($user->getEmail());
        
        $query ="INSERT INTO `user`(`firstName`, `lastName`, `email`, `password`) VALUES ('$firstName','$lastName','$email','$password')";
        run_mysql_query($query);
    }

    function GetUser($email)
    {
        $email=escape_this_string($email);

        $query = "SELECT `firstName` ,`lastName`,`email` , `password` FROM `user` WHERE `email`='$email'";
        $result = fetch_record($query);
        $user = new User($result['firstName'],$result['lastName'],$result['email'],$result['password']);
 	    return $user;
    }

    

}
?>
