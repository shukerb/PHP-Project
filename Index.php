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
    <link rel="stylesheet" href="assets/style.css">
    <title>PHP Assignment</title>
</head>
<body>
    <div class="container z-depth-5 valign-wrapper ">
        
        <div class="row" >
        <h3>Login In</h3>
            <form action="View/LogInView.php" method="POST" class="col " id="signInForm" >
                <div class="input-field col ">
                
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email"  name="Email" id="email" >
                    </div>
                    <div class="row">
                            <label for="password">Password</label>
                            <input type="password"  name="Password" id="password">
                    </div>
                    <div class="switch row">
                        <label>
                        Remmember me
                        <input type="checkbox" name="Remember">
                        <span class="lever"></span>
                        </label>
                    </div>
                    
                    <div class="row"><button class="btn waves-effect waves-light" type = "submit"> Login</button></div>
                    <div class="row"><a href="assets/passwordRequest.php">Forgot my password</a></div>
                    <div class="row">Don't have an account?</div>
                    <div class="row"><a href="assets/SignUp.php" class="btn waves-effect waves-light">Signup</a></div>
                    <div class="row"><span calss="helper-text" style= "color:red;"><?= $_SESSION['message']?></span></div>
                        
                    
                    
                </div>
            </form>
        
        </div>
    </div>
       




<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>