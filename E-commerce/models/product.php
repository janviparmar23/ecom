<?php

class productModel
{
    private $con;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
    }
    public function add($data)
    {
        $name= $data['name'];
        $description =$data['description'];
        $alias=$data['alias'];
        $qty=$data['qty'];
        $status=$data['type'];
        $modifydate=$data['modifydate'];
        $modifydate = date("Y-m-d");
        $price = $data['price'];
        
       $sql="INSERT INTO `product`(`name`, `description`, `alias`, `qty`, `status`, `Price`,`modifydate`) VALUES ('$name','$description','$alias','$qty','$status','$price','$modifydate')";
      
        if (mysqli_query($this->con, $sql)) {
            
            return true;
        } else {
            // echo "error" . mysqli_error($this->con);
            return false;
        }
    }
    public function show(){
        $sql = "SELECT * FROM `product` ";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;

    }

    public function addproductImage($data){
        $type = $data['type'];
        $images = [];
        foreach ($_FILES['files']['name'] as $key => $file) {
            $pic = $file;
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            move_uploaded_file($tmp_name, 'images/' . basename($pic));
            $images[] = $pic;
        }
        $images_str = "('" . implode("','$type'),('", $images) . "','$type')";
        $sql = "INSERT INTO `product_image`(`name`, `Product_id`) VALUES  $images_str";
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }

    }
  
    public function addaddress()
    {
        $type = $_POST['type'];
        $user_id = $_SESSION['ID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phoneno'];
        $address = $_POST['address'];
        $same_as_bill = $_POST['same_as_bill'];

        $stype = $_POST['stype'];
        $suser_id = $_SESSION['ID'];
        $sname = $_POST['sname'];
        $semail = $_POST['semail'];
        $sphone = $_POST['sphoneno'];
        $saddress = $_POST['saddress'];
        $shipto = $_POST['shipto'];


        $sql = "INSERT INTO `Address`(`type`, `user_id`, `name`, `email`, `phone`, `address`, `same_as_bill`) 
        VALUES ('$type','$user_id','$name','$email','$phone','$address','$same_as_bill');";


        if ($same_as_bill == 1) {
        } else {
            $sql .= "INSERT INTO `Address`(`type`, `user_id`, `name`, `email`, `phone`, `address`, `same_as_bill`) 
            VALUES ('$stype','$suser_id','$sname','$semail','$sphone','$saddress','$shipto');";
        }
        $row = mysqli_multi_query($this->con, $sql);
        if ($row) {

            $_SESSION['billto'] =  mysqli_insert_id($this->con);
            $_SESSION['shipto'] = mysqli_insert_id($this->con);

            return true;
        } else {
            echo "error" . mysqli_error($this->con);
            return false;
        }
    }
}
?>