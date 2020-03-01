<?php
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();
$_SESSION['message']= '';
$email = $_POST ['Email'];
$password= $_POST ['Password'];

//make sure that the form is submited
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	//check if the user left any empty fields.
	if (!empty($email)&&!empty($password))
	{
        //user information fro the database, if the user existe.
        $controller = new  UserController();
        $user = $controller -> GetUser($email);
		if ($user->getEmail()==$email)
		{
			//check the password
			$passwordCheck= password_verify($password, $user->getPassword());
			if ($passwordCheck=true)
			{
                //check if remember me box is active and set a cookie 
                if (!empty($_POST['Remember'])) {
                    //$token= $user->getToken();
                    //setcookie("loginToken", $token, time() + (86400 * 30), "/");
                }
				$_SESSION['user']= serialize($user);
                $_SESSION['message']=('Welcome you are loged in');
                
					header('location: ../assets/Home.php');
				
			}
			else{$_SESSION['message']='Wrong password please try again';
				header('location: ../index.php');}
		}
		else{$_SESSION['message']='Email does not exist in the DataBase<br> please sign up.';
					header('location: ../index.php');}
		
	}
	else
	{
		$_SESSION['message']='Please Enter your Email and password';
		header('location: ../index.php');
	}
}
?>