<?php
session_start();
require_once('Model/UserModel.php');
//check if the user is set 
if (!isset($_SESSION['user'])) {
    header('location: ..//Index.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <title>PHP Assignment</title>
</head>
<body>
    

    <div class="container">
        <h1>welcome</h1>
        
    </div>
    <div class="container z-depth-5 valign-wrapper ">
        
        <div class="row" >
        <h3><?= $_SESSION['message']?></h3>
        
        <div class="row"><a href="#" class="btn waves-effect waves-light">Edite your Information</a></div>
        <div class="row"><button class="btn waves-effect waves-light" onclick="DeleteConfermation()"> Delete your account</button></div>
        <div class="row"><a href="..//View/LogOutView.php" class="btn waves-effect waves-light">Logout</a></div>
        
        </div>
    </div>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="script.js"></script> 
</body>
</html>