<?php
class TokenModel{

    private $email;
    private $selector;
    private $token;
    private $exTime;

    function __construct($email,$selector,$token,$exTime){
        $this->email=$email;
        $this->selector=$selector;
        $this->token=$token;
        $this->exTime=$exTime;
    }

    //getters

    public function getEmail(){
        return $this->email;
    }

    public function getSelector(){
        return $this->selector;
    }

    public function getToken(){
        return $this->token;
    }
    
    public function getExTime(){
        return $this->exTime;
    }

}
?>