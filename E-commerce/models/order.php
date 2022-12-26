<?php

class orderModel
{
    private $con;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
    }

    public function orderview()
    {

        $sql = " SELECT `order_id`, `customer_id`, `status`, `pr_TOTAL` FROM `order` ;";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }
    
    public function updatebill()
    {
        $bID = $_POST['bid'];
        $btype = "bill";
        $bname = $_POST['bname'];
        $bemail = $_POST['bemail'];
        $bphone = $_POST['bphone'];
        $baddress = $_POST['baddress'];

        $sql = "UPDATE `Address` SET `name`='$bname',`email`='$bemail',`phone`='$bphone',`address`='$baddress' WHERE `ID` = '$bID' AND `type` = '$btype' ";
        echo $sql;
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function updateshipto()
    {
       $sID = $_POST['sid'];
        $type = "shipto";
        $name = $_POST['sname'];
        $email = $_POST['semail'];
        $phone = $_POST['sphone'];
        $address = $_POST['saddress'];
        $sql = "UPDATE `Address` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE `ID` = '$sID' AND `type` = '$type' ";
       
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function showaddressship($order_id)
    {
        $sql = "SELECT `name`, `email`, `phone`, `address`, ID FROM `Address`as A, `order` as O WHERE `type`= 'shipto' AND A.user_id = O.customer_id and O.order_id = $order_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function showaddressbill($order_id)
    {

        $sql = "SELECT `name`, `email`, `phone`, `address`, ID FROM `Address`as A, `order` as O WHERE `type`= 'bill' AND A.user_id = O.customer_id and O.order_id = $order_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function updateorderstatus()
    {
        $ID= $_POST['order_id'];
        $type=$_POST['type'];
        $sql = "UPDATE `order` SET `status`='$type' WHERE `order_id`='$ID'";
       
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }

    }
    public function orderviewdetail($order_id)
    {
        $sql = "SELECT O.`order_id`,O.`status`,O.`pr_TOTAL`,A.`name` FROM `order` as O ,`Address` as A WHERE A.`user_id` = O.`customer_id` and A.type = 'bill' AND O.order_id = $order_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
}
