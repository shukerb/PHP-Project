<?php
session_start();    
include("../vendor/autoload.php");
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_8nr7Jtgqm5AwtFNmeydKEPKxeKmqkc");

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => "10.00"
    ],
    "description" => "10.00 Euros payment",
    "redirectUrl" => "https://628584.000webhostapp.com/assets/Home.php",
]);
$id =$payment->id;
$_SESSION['LastPayment']= $id;
header("Location: " . $payment->getCheckoutUrl(), true, 303);


    
?>