<?php

include_once(__DIR__.'/../models/user.php');
class Registration
{
    private $con;
    private $userModel; 
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
        $this->userModel = new userModel();
    }
    public function doRegister()
    {
        if($this->userModel->save($_POST)){
            echo "User register successfully!";
        }else{
            echo "Something went wrong!";
        }
    }
    public function doLogin()
    {
        if($this->userModel->login($_POST)){
            echo " login succesfull";
        }
        else
        {
            echo " something went wrong";
        }
    }
    public function contactus(){
        if($this->userModel->contactus($_POST)){
           // echo " login succesfull";
        }
        else
        {
            //echo " something went wrong";
        }
    }
}
?>