<?php
class User{

    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $id;

    function __construct($firstname,$lastname,$email,$password){
        $this->firstName=$firstname;
        $this->lastName=$lastname;
        $this->email=$email;
        $this->password=$password;
    }
    //setters
    public function setID($id){
    $this->id=$id;
    }
    //edit the user information.
    public function editUser($firstname,$lastname,$email,$password){
        $this->firstName=$firstname;
        $this->lastName=$lastname;
        $this->email=$email;
        $this->password=$password;
    }

    //set user password
    public function editPassword($password){
        $this->password=$password;
    }
    //a getter for each element.
    
    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function getPassword(){
        return $this->password;
    }


    public function getID(){
        return $this->id;
    }
}

?>