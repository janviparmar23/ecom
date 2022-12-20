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
        $currentdate = $data['Current_date'];
        $usergroup = 1;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $currentdate = date("Y-m-d");
        
        $sql = " INSERT INTO `user`(`emailid`, `Password`, `FirstName`, `LastName`, `Created-date`, `User_Group`) VALUES ('$emailid','$password','$firstname','$lastname','$currentdate','$usergroup')";
        if (mysqli_query($this->con, $sql)) {
            session_start();
            $_SESSION['emailid'] = $emailid;
            $_SESSION['FirstName'] = $firstname;
            $_SESSION['LastName'] = $lastname;
            $_SESSION['ID'] = mysqli_insert_id($this->con);
            
            return true;
            
            // echo "data insertted ";
            //header('location: dashboard.php');

        } else {
            echo "error" . mysqli_error($this->con);
            return false;
        }
    }
    public function login($data){
        session_start();
        $emailid = $data['emailid'];
        $password = $data['password'];
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

   
}