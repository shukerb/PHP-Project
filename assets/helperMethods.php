<?php 
require_once('../Model/UserModel.php');
require_once('../Controller/UserController.php');
require_once('../pdfMaker.php');
require_once("../vendor/autoload.php");

class helper{
    function checkPaymentStatus($paymentId){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mollie.com/v2/payments/$paymentId");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $headers = array();
        $headers[] = "Authorization: Bearer test_8nr7Jtgqm5AwtFNmeydKEPKxeKmqkc";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $decodedArray = json_decode($result, true);
        if (curl_errno($ch)) 
        {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $_SESSION['paymentStatus']=$decodedArray['status'];
        //check if paid it will make a pdf
        // if ($decodedArray['status']=='paid') {
        //     $user = unserialize($_SESSION['user']);
        // $userName=$user->getFirstName();
        // $userEmail= $user->getEmail();
        // $pdfMaker = new pdfMaker();
        // $pdfMaker->Receipt($userName,$paymentId);
        // //emailConfirmation($userEmail);
        
        // }
        
    }
    function emailConfirmation($email){

        $to = $email;
            $subject = "Successful Payment";
            $message = '<p> We recived your payment<br>, please find the receipt attached in this email.';
            $header = "From: 628584@student.inholland.nl\r\n";
            $header .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $header);

    }


}
?>