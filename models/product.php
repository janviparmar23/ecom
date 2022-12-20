<?php

class productModel
{
    private $con;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
    }
    public function show()
    {
        $sql = "SELECT q.name as image,p.name,p.Price,p.ID,p.qty from product as p LEFT JOIN product_image as q on p.ID = q.Product_id LIMIT 6";
        $result = mysqli_query($this->con, $sql);
        $data = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        // echo "<pre>";
        //print_r($data);
        //$_SESSION['data'] = ['image'];
        //['Price']['ID']['Image'];
        //$_SESSION['Price'] = ;

        //print_r($_SESSION);

        return $data;
    }

    public function storedata()
    {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $ID = $_POST['ID'];
        $qty = $_POST['qty'];
        $image = $_POST['image'];

        $sql = "SELECT q.name as image,p.name,p.Price,p.ID,p.qty from product as p LEFT JOIN product_image as q on p.ID = q.Product_id where 
                p.ID='$ID'";

        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row) {
            if (!isset($_SESSION['products'])) {
                $_SESSION['products'] = array();
            }
            array_push($_SESSION['products'], [
                'Name' => $name,
                'Price' => $price,
                'ID' => $ID,
                'qty' => $qty,
                'image' => $image,
                'total' => $price * $qty
            ]);

            return true;
        } else {

            return false;
        }
    }

    public function removeproductfromcart($id)
    {

        $session = $_SESSION['products'];
        $finaltotal = 0;
        $a = [];
        foreach ($session as $array) :
            if ($array['ID'] != $_POST['id']) {
                $a[] = $array;
            }
            $finaltotal += $array['total'];
        endforeach;

        if (isset($_SESSION['products'])) {
            $_SESSION['products'] = $a;
            $_SESSION['Total'] = $finaltotal;
        }

        return true;
    }

    public function ADDTOCART()

    {
        $b = [];
        $finaltotal = 0;
        $finalproduct = 0;
        $session = $_SESSION['products'];

        foreach ($session as $session) {
            $key = $session['ID'] . '|' . $session['Name'];
            if (!isset($b[$key])) {
                $b[$key] = $session;
            } else {

                $b[$key]['qty'] += $session['qty'];
                $b[$key]['total'] = $b[$key]['Price'] * $b[$key]['qty'];
            }
            $finaltotal += $session['total'];
        }

        $session = array_values($b);
        $_SESSION['products'] = array_values($b);
        $_SESSION['Total'] = $finaltotal;
        
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
            // $sql .="INSERT INTO `Address`(`type`, `user_id`, `name`, `email`, `phone`, `address`, `same_as_bill`)  VALUES ('$type','$user_id','$name','$email','$phone','$address','$same_as_bill');";
        } else {
            $sql .= "INSERT INTO `Address`(`type`, `user_id`, `name`, `email`, `phone`, `address`, `same_as_bill`) 
            VALUES ('$stype','$suser_id','$sname','$semail','$sphone','$saddress','$shipto');";
        }

        $row = mysqli_multi_query($this->con, $sql);

        if ($row) {
            return true;
        } else {
            echo "error" . mysqli_error($this->con);
            return false;
        }
    }
}
