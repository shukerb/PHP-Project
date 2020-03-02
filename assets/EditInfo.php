<?php
require_once('../Model/UserModel.php');
session_start();
$user = unserialize($_SESSION['user']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <title>PHP Assignment</title>
</head>
<body>
    <div class="container z-depth-5 valign-wrapper">
        
        <div class="row">
        <h3>Edit Your Profile </h3>
            <form action="../View/EditInfoView.php" method="POST" class="col" id="signInForm" novalidate >
                <div class="input-field col">
                
                    <div class="row">
                        <div class="col">
                            <label for="firstName">First Name</label>
                            <input type="text"  name="First-Name" id="firstName" onfocusout=" validateFirstName()" value="<?= $user->getFirstName()?>">
                            <span class="helper-text"></span>
                        </div>
                        <div class="col">
                            <label for="lastName">Last Name</label>
                            <input type="text"  name="Last-Name" id="lastName" onfocusout=" validateLastName()"value="<?=$user->getLastName()?>">
                            <span class="helper-text"></span>
                        </div>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email"  name="Email" id="email" onfocusout=" validateEmail()"value="<?= $user->getEmail()?>">
                        <span class="helper-text"></span>
                    </div>
                    <h5>Confirm your password to submit the changes </h5>
                    <div class="row">
                        <label for="email">password</label>
                        <input type="password"  name="Password" id="password">
                        <span class="helper-text"></span>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type = "submit"> Change my Information</button>
                    </div>
                    <div class="row">
                    <span calss="helper-text" style= "color:red;"> <?= $_SESSION['message']?> </span>
                    </div>
                    
                    
                    
                </div>
            </form>
        
        </div>
    </div>
       




<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="script.js"></script> 
</body>
</html>
