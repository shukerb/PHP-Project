<?php
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();
$_SESSION['message']= '';
    //variables
$firstName = $_POST ['First-Name'];
$lastName = $_POST ['Last-Name'];
$password = $_POST ['Password'];
$confirm_password = $_POST['Confirm-Password'];
$email = $_POST ['Email'];


    /*--------------------FORM VALIDATION------------------*/
        //make sure that the form is submited //$_SERVER['REQUEST_METHOD']=='POST'
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {

            //form is not empty 
            if (!empty($email)&&!empty($password)&&!empty($confirm_password)&&!empty($firstName)&&!empty($lastName)) 
            {
                // Check if first and last name are valid input
                if (preg_match("/^[a-zA-Z]+$/",$firstName) && preg_match("/^[a-zA-Z]+$/",$lastName))
                {
                    //check if email is valid
                    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    
                        //two passwords are matching 
                        if ($password==$confirm_password)
                        {
                            //check if email does not exist in DB
                            
                            $controller = new UserController();
                            $existingUser = $controller->GetUser($email);
                            if ($existingUser->getEmail()!=$email)
                            {
                                $token=generateToken();
                                $user=new User($firstName,$lastName,$email,$password,$token);
                                $controller->AddUser($user);
                                $_SESSION['user']= serialize($user);
                                $_SESSION['message']=('Welcome you created an account and loged in');
                                header('location: ../Home.php');

                            }
                            else{$_SESSION['message']='Email already exist in the DataBase';
                                header('location: ../SignUp.php');}
                        }
                        else
                        {$_SESSION['message']='Passwords does not match.';
                        header('location: ../SignUp.php');
                        }
                    }
                    else {
                        $_SESSION['message']= "Make sure to use valid email";
                        header('location: ../SignUp.php');
                    }
                }
                else{$_SESSION['message']= "First name or Last name is wrong <br> Please make sure to use only letters";
                header('location: ../SignUp.php');}
            }
            else {$_SESSION['message']= "Please fill in all the data";
            header('location: ../SignUp.php');}
        }
        else {
            $_SESSION['message']= "Error submiting the data!";
            header('location: ../SignUp.php');
        }

    function generateToken($length = 20)
    {
    return bin2hex(random_bytes($length));
    }


?>