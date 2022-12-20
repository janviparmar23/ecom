<?php


   
class orderModel
{
  
    private $con;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
    }
 public function orderdata()
    {

        $customer_id = $_POST['cutomer_id'];
        $bill_to =  $_POST['bill_to'];
        $ship_to =  $_POST['shipto'];
        $status =  $_POST['status'];

        $sql = "INSERT INTO `order`(`customer_id`, `billto_id`, `shipto_id`, `status`) VALUES ('$customer_id','$bill_to','$ship_to','$status')";
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            echo "error" . mysqli_error($this->con);
            return false;
        }
    }

    public function billdata()
    {
    
        $sql =  "SELECT ID,type FROM Address";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function ordercomplete()
    {

        $sql =  "UPDATE `order` SET `status`='complete' ";
        if (mysqli_query($this->con, $sql)) {
        } else {
            echo " something went wrong";
        }
    }
    public function cancelorder()
    {
        $sql =  "UPDATE `order` SET `status`='cancel' ";
        if (mysqli_query($this->con, $sql)) {
        } else {
            echo " something went wrong";
        }
    }
}
