<?php
require_once('DBconnection.php');
require_once('../Model/TokenModel.php');
class TokenController{

    function AddToken($token)
    {
        
        $tokenNumber= password_hash($token->getToken(), PASSWORD_DEFAULT);
        $selector= escape_this_string($token->getSelector());
        $exTime=escape_this_string($token->getExTime());
        $email=escape_this_string($token->getEmail());
        
        
        $query ="INSERT INTO `pwdreset` ( `email`, `selector`, `token`, `expiredTime`) VALUES ('$email', '$selector', '$tokenNumber', '$exTime')";
        run_mysql_query($query);
    }

    function GetToken($selector)
    {
        $currentDate=date("U");
        $query = "SELECT `email`, `selector`, `token`, `expiredTime` FROM `pwdreset` WHERE `selector`='$selector' AND `expiredTime`>= '$currentDate'";
        $result = fetch_record($query);
        $token = new TokenModel($result['email'],$result['selector'],$result['token'],$result['expiredTime']);
 	    return $token;
    }



    function DeleteToken($email){
        $query ="DELETE FROM `pwdreset` WHERE `pwdreset`.`email` = '$email'";
        run_mysql_query($query);
    }
}
?>