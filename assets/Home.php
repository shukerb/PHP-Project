<?php
session_start();
require_once('../Model/UserModel.php');
require_once('helperMethods.php');
$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 100;
if (isset($_SESSION['LastPayment'])) {
    
    $helper=new helper();
    $helper->checkPaymentStatus($_SESSION['LastPayment']);
if ($_SESSION['paymentStatus']==='paid') {
    require_once('../View/recieptMaker.php');
    $_SESSION['message']='your payment is successful';

}
}


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
    
    <div class="container z-depth-5 valign-wrapper ">
        
        <div class="row" >
        <h3><?= $_SESSION['message']?></h3>

        <div class="row"><a href="..//assets/searchResults.html" class="btn waves-effect waves-light">get some random GIFs</a></div>

        <div class="row">
            <h5> upload a photo</h5>
            <form action="../View/uploadPic.php" method="POST" enctype= "multipart/form-data" class = "col" >
            <div class="row"><input type = "file" name ="photo" ></div>
            <div class="row"><button class="btn waves-effect waves-light " type = "submit" name = "submit "> Upload your Photo</button></div>
            </form>
        </div>
        
        <div class="row"><a href="../Controller/CSVController.php" class="btn waves-effect waves-light"> CSV</a></div>
        <div class="row"><a href="../Controller/downloadPDF.php" class="btn waves-effect waves-light">download a pdf</a></div>
        <div class="row"><a href="../View/Payment.php" class="btn waves-effect waves-light">make payment</a></div>
        <div class="row"><a href="EditInfo.php" class="btn waves-effect waves-light">Edite your Information</a></div>
        <div class="row"><button class="btn waves-effect waves-light" onclick="DeleteConfermation()"> Delete your account</button></div>
        <div class="row"><a href="..//View/LogOutView.php" class="btn waves-effect waves-light">Logout</a></div>
        
        </div>
    </div>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="script.js"></script> 
</body>
</html>