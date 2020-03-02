<?php
require_once('../Model/TokenModel.php');
require_once('../Controller/TokenController.php');
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();



//this statment will be used by the change password form
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $password = $_POST ['Password'];
    $confirm_password = $_POST['Confirm-Password'];
    $selector=$_SESSION['selector']=$selector;
    $validator=$_SESSION['validator'];
    if (!empty($password)&&!empty($confirm_password)) 
    {
        if ($password==$confirm_password)
        {
            if (!empty($selector)&& !empty($validator)) {
                $tokenController = new TokenController();
                $token=$tokenController->GetToken($selector);

                //get the email saved with the token
                $tokenEmail=$token->getEmail();

                //make sure that the token in the db matches the validator
                $tokenBin= hex2bin($validator);
                $tokenCheck=password_verify($tokenBin,($token->getToken()));
                if ($tokenCheck)
                {
                    //delete the token in the DB
                    $tokenController->DeleteToken($email);
                    //now we have to get the user with the same email
                    $userController=new UserController();
                    //user object
                    $user = $userController ->GetUser($tokenEmail);
                    //change the user's password
                    $user->editPassword($password);
                    //edit the user in the db
                    $userController->EditUser($user);
                    $_SESSION['message']='Password has been successfuly changed.';
                    header('location: ../index.php');
                }
                else{$_SESSION['message']='could not validate your request!';
                    header('location: ../assets/SinUp.php');
                }
                


            }
            else{$_SESSION['message']='could not validate your request!';
                header('location: ../assets/SinUp.php');
            }
           
            
        }
        else
        {$_SESSION['message']='Passwords does not match.';
        header('location: ../assets/SignUp.php');
        }
    }
    else{$_SESSION['message']='please fill both of the fields';
        header('location: ../assets/creatNewPassword.php');
    }

}

//the url sent to the email will use this statment 
else {
    $selector= $_GET["selector"];
    $validator = $_GET["validator"];
    if (!empty($selector)&& !empty($validator))
    {
        if (ctype_xdigit($selector) && ctype_xdigit($validator))
        {

            $_SESSION['validator']=$validator;
            $_SESSION['selector']=$selector;
            header('location: ../assets/creatNewPassword.php');
        }
        else
        {$_SESSION['message']='error with the token type';
            header('location: ../index.php');
        }
    }
    else
    {$_SESSION['message']='could not validate your request!';
        header('location: ../index.php');
    }
}



?>