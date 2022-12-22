<?php

class userModel {
    private $con;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
    }
    public function save($data){
        $emailid = $data['emailid'];
        $password = $data['password'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $usergroup = 1;
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `User`( `emailid`, `Password`, `FirstName`, `LastName`, `User_Group`) VALUES ('$emailid','$password','$firstname','$lastname','$usergroup')";
       
        if (mysqli_query($this->con, $sql)) {
            session_start();
            $_SESSION['emailid'] = $emailid;
            $_SESSION['FirstName'] = $firstname;
            $_SESSION['LastName'] = $lastname;
            $_SESSION['ID'] = mysqli_insert_id($this->con);
            return true;
        } else {
            echo "error" . mysqli_error($this->con);
            return false;
        }
    }
    public function login(){
  
        $emailid = $_POST['emailid'];
        $password = $_POST['password'];
        $hash = "SELECT  ID , `Password` FROM `user` WHERE emailid ='$emailid' ";
        $result = mysqli_query($this->con, $hash);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $verify = password_verify($password, $row['Password']);
        if ($verify) {
      
            $_SESSION['emailid'] = $emailid;
            $_SESSION['ID'] = $row['ID'];
            return true;
            //echo "Login succesfull";
            // header("location: dashboard.php");
        } else {
           // echo 'Incorrect Password!';
            return false;
        }
    }

    public function contactus(){

        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Number = $_POST["Number"];
        $Message = $_POST["Message"];
        $sql="INSERT INTO `contact`(`Name`, `Email`, `Phone`, `Message`) VALUES ('$Name','$Email','$Number','$Message')";
        if (mysqli_query($this->con, $sql)) {
            //header('location: blog.php');
        } else {
            echo "error" . mysqli_error($this->con);
        }
    }

   
}