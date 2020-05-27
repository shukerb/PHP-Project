<?php
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    
    $photo = $_FILES['photo'];
    $photoName = $photo['name'];
    $photoTempName = $photo['tmp_name'];
    $photoSize= $photo['size'];
    $photoError = $photo['error'];
    $photoType = $photo['type'];
    
    $ext= explode('.',$photoName);
    $photoExt= strtolower (end($ext));

    $allowedExt= array ('jpg','jpeg','png','gif');
    if (in_array($photoExt, $allowedExt)) {
        if ($photoError===0 ) {
            if ($photoSize < 500000) {
                
                $photoNewName = uniqid('',true)."."."$photoExt";

                $photoDestination = '../Uploads/'.$photoNewName;
                move_uploaded_file($photoTempName,$photoDestination);
         
    
                // Load image file  
                $image = imagecreatefrompng($photoDestination);   
                
                // Use imagerotate() function to rotate the image 
                $img = imagerotate($photoDestination, 180, 0); 
                
                // Output image in the browser  
                header("Content-type: image/png");   
                

                
               // header('location: ../assets/Home.php?uploadIsSuccessful');

            } else {
                $_SESSION['message']='your photo is too big, please try something else';
                header('location: ../assets/Home.php');
            }
        } else {
            $_SESSION['message']='there was an error uploading your file!';
            header('location: ../assets/Home.php');
        }
    } else {
        $_SESSION['message']='you can not upload this photo type!';
        header('location: ../assets/Home.php');
    }

}
   
?>