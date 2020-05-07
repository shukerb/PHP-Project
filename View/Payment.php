<?php
include("vendor/autoload.php");
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("Add api key here");

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => "10.00"
    ],
    "description" => "My first API payment",
    "redirectUrl" => "https://www.youtube.com/watch?v=Uqp0b2soCUU&t=368s",
    "webhookUrl"  => "https://www.youtube.com/watch?v=Uqp0b2soCUU&t=368s",
]);
print $payment->id;
header("Location: " . $payment->getCheckoutUrl(), true, 303);
?>