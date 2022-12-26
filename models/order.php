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
        $PR_TOTAL = $_POST['producttotal'];

        $sql = "INSERT INTO `order`(`customer_id`, `billto_id`, `shipto_id`, `status`,`pr_TOTAL`) VALUES ('$customer_id','$bill_to','$ship_to','$status','$PR_TOTAL')";

        $row = mysqli_query($this->con, $sql);
        if ($row) {
            return  mysqli_insert_id($this->con);
        } else {
            echo "error" . mysqli_error($this->con);
            return false;
        }
    }

    public function ordercomplete($order_id)
    {

        $sql =  "UPDATE `order` SET `status`='complete' where order_id = $order_id ";
        if (mysqli_query($this->con, $sql)) {

        } else {
            echo " something went wrong";
        }
    }
    public function cancelorder($order_id)
    {

        $sql =  "UPDATE `order` SET `status`='cancel' where order_id = $order_id";
        if (mysqli_query($this->con, $sql)) {
        } else {
            echo " something went wrong";
        }
    }

    public function insertorderproducts($orderId, $products)
    {
        echo "<pre>";
        print_r($products);
        $string = [];
        foreach($products as $product){

            $string[] = "('".$orderId."','".$product['ID']."','".$product['qty']."','".$product['Price']."','".$product['total']."')" ;
        }

        $string = implode(",", $string );
        $sql = "INSERT INTO `order_products`( `order_id`, `product_id`, `product_qty`, `product_price`, `product_total`) VALUES $string ";

        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function orderlistingview()
    {
        $ID = $_SESSION['ID'];
        $sql = "SELECT O.`order_id`,O.`status`,O.`pr_TOTAL`,A.`name` FROM `order` as O ,`Address` as A WHERE A.`user_id` = O.`customer_id` and A.type = 'bill' AND O.customer_id = $ID ";
      
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function orderviewdatilfromorderid($order_id)
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

    public function detailsofadd($order_id)
    {

        $sql = "SELECT `name`, `email`, `phone`, `address` FROM `Address`as A, `order` as O WHERE `type`= 'bill' AND A.user_id = O.customer_id and O.order_id = $order_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function detailstoaddship($order_id)
    {
        $sql = "SELECT `name`, `email`, `phone`, `address` FROM `Address`as A, `order` as O WHERE `type`= 'shipto' AND A.user_id = O.customer_id and O.order_id =  $order_id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function productdetail($order_id)
    {
        $sql="SELECT p.`ID` as Product_id, p.`name` as product_name, p.`qty` as product_quanitity , p.`Price` as product_price ,I.`name` as product_image , op.`product_total` as product_total FROM `product` as p ,`order_products` as op,`product_image` as I WHERE p.ID = I.Product_ID and p.ID = op.product_ID AND op.order_id = $order_id";
      
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function ordertotal($order_id)
    {
        $sql = "SELECT  `pr_TOTAL` FROM `order` WHERE order_id = $order_id";
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
