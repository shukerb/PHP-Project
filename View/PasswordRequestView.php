<?php
require_once('../Model/TokenModel.php');
require_once('../Controller/TokenController.php');
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $email = $_POST ['Email'];
    if (!empty($email))
    {
        //check if email exist
        $controller = new  UserController();
        $user = $controller -> GetUser($email);
		if ($user->getEmail()==$email)
		{
            $selector=bin2hex(random_bytes(8));
            $token = random_bytes(16);
            $url = "www.628584.000webhostapp.com/assets/creatNewpassword.php?selector=".$selector."&validator=".bin2hex($token);
            //expierd time of the token will be after an hour 
            $exTime= date("U")+1800;
            //check if the user have any token in the db and delete it 
            $tokenController= new TokenController();
            $tokenController->DeleteToken($email);

            //here we add the new token
            $newToken=new TokenModel($email,$selector,$token,$exTime);
            $tokenController->AddToken($newToken);

            //send the email
            $to = $email;
            $subject = "Reset Your Password";
            $message = '<p> We recived a password reset request, the link is to reset your password.
            If you did not make this request, you can ignore this email. <br> Hereis your password recover link:<br> 
            <a href="'.$link.'">'. $link .'</a></p>';
            $header = "From: 628584@student.inholland.nl\r\n";
            $header .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $header);

            //send the user to the index page again
            $_SESSION['message']='An email to reset your password is sent';
            header('location:../index.php');

        }
        else{$_SESSION['message']='Email does not exist in the DataBase<br> please sign up.';
            header('location: ../assets/SignUp.php');}
    }
    else {
        $_SESSION['message']='Please Enter your Email ';
		header('location: ../assets/passwordRequest.php');
    }


}




?>
