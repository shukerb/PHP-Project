<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$requestType=$_SERVER['REQUEST_METHOD'];
if ($requestType=='GET'){
    http_response_code(200);
    $json= json_encode(['status'=>'200',
    'text'=> 'hello there']);
    echo ($json);
}
if ($requestType=='POST')
{
    http_response_code(200);
    $body=getRequestBody();
    $json= json_encode(['status'=>'200',
    'messege'=>'hello there Mr/Mrs'.$body['user']['name']]);
    echo ($json);
}
function getRequestBody() {
    $data = file_get_contents('php://input');
    $requestBody= json_decode($data,true);
    return $requestBody;
   
}