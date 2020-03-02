<?php
session_start();
if (empty($_SESSION['message'])) {
    $_SESSION['message']=' ';
}
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
    <div class="container z-depth-5 valign-wrapper ">
        
        <div class="row" >
            <h3>Create new Password</h3>
            <form action="../View/newPwdView.php" method="POST" class="col " id="signInForm" >
                <div class="input-field col ">
                
                    <div class="row">
                            <label for="password">Password</label>
                            <input type="password"  name="Password" id="password" onfocusout=" validatePassword()">
                            <span class="helper-text"></span>
                    </div>
                    <div class="row">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password"  name="Confirm-Password" id="confirmPassword" onfocusout=" validateConfirmPassword()">
                            <span class="helper-text"></span>
                    </div>
                    <div class="row"><button class="btn waves-effect waves-light" type = "submit"> Reset Password </button></div>
                    <div class="row"><span calss="helper-text" style= "color:red;"><?= $_SESSION['message']?></span></div>
                        
                </div>
            </form>
        
        </div>
    </div>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="script.js"></script> 
</body>
</html>