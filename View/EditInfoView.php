<?php
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();
$_SESSION['message']= '';
    



    /*--------------------FORM VALIDATION------------------*/
        //make sure that the form is submited //$_SERVER['REQUEST_METHOD']=='POST'
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            //variables
            $firstName = $_POST ['First-Name'];
            $lastName = $_POST ['Last-Name'];
            $email = $_POST ['Email'];
            $password=$_POST ['Password'];
            

            if (!empty($email)&&!empty($firstName)&&!empty($lastName)) 
            {
                // Check if first and last name are valid input
                if (preg_match("/^[a-zA-Z]+$/",$firstName) && preg_match("/^[a-zA-Z]+$/",$lastName))
                {
                    //check if email is valid
                    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                        //unserialize the user object
                        $user = unserialize($_SESSION['user']);
                        $userID=$user->getID();
                        
                        $passwordCheck= password_verify($password, $user->getPassword());
                        var_dump($user);
                        var_dump($user->getPassword()) ;
                        var_dump(password_hash($password, PASSWORD_DEFAULT)) ;
                        if ($passwordCheck) {
                            //edite existing user 
                            //$editedUser=$user->editUser($firstName,$lastName,$email,$password);
                            
                            $newUser=new User($firstName,$lastName,$email,$password);
                            $newUser -> setID($userID);
                            //submit the changes to the db
                            var_dump($newUser) ;
                            $userController=new UserController();
                            $userController->EditUser($newUser);
                            //send feedback and redirect
                            $_SESSION['message']= "Your data has been changed.";
                            
                            //header('location: ../assets/Home.php');
                        }
                        else {
                            $_SESSION['message']= "Wrong password";
                       // header('location: ../assets/EditInfo.php');
                        }
                       

                    }
                    else{$_SESSION['message']= "First name or Last name is wrong <br> Please make sure to use only letters";
                        header('location: ../assets/EditInfo.php');}
                }
                else{$_SESSION['message']= "First name or Last name is wrong <br> Please make sure to use only letters";
                    header('location: ../assets/EditInfo.php');}
            }
            else {
                $_SESSION['message']= "Please fill in all the data";
                header('location: ../assets/EditInfo.php');
            }
        }
    
?>