<?php

include_once(__DIR__ . '/../models/order.php');
class order
{
    private $con;
    private $orderModel;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
        $this->orderModel = new orderModel();
    }

    public function orderdata()
    {
        if ($this->orderModel->orderdata($_POST)) {
            
        } else {
            echo "Something went wrong!";
        }
    }

    public function ordercomplete()
    {

    }
    public function cancelorder()
    {

    }
    public function billdata()
    {

        $data = $this->ordermodel->billdata();
        return $data;

    }
}
