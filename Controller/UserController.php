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
        $token=escape_this_string($user->getToken());
        
        $query ="INSERT INTO `user`(`firstName`, `lastName`, `email`, `password`,`token`) VALUES ('$firstName','$lastName','$email','$password','$token')";
        run_mysql_query($query);
    }

    function GetUser($email)

    {
        $email=escape_this_string($email);

        $query = "SELECT `ID`,`firstName` ,`lastName`,`email` , `password`,`token` FROM `user` WHERE `email`='$email'";
        $result = fetch_record($query);
        $user = new User($result['firstName'],$result['lastName'],$result['email'],$result['password'],$result['token']);
        $user->setID($result['ID']);
 	    return $user;
    }

    function EditUser($user){
        $firstName= escape_this_string($user->getFirstName());
        $lastName= escape_this_string($user->getLastName());
        $password=password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $email=escape_this_string($user->getEmail());
        $id=escape_this_string($user->getID());

        $query ="UPDATE `user` SET `firstName` = '$firstName', `lastName` = '$lastName',`password` = '$password',`email` = '$email' WHERE `user`.`ID` = '$id'";
        run_mysql_query($query);

    }
    
    function DeleteUser($id){
        $query ="DELETE FROM `user` WHERE `user`.`ID` = '$id'";
        run_mysql_query($query);
    }


}
?>
