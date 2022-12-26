<?php

include_once(__DIR__ . '/../models/order.php');
class order
{
    private $con;
    private $ordermodel;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
        $this->ordermodel = new orderModel();
    }

    public function showorderdetail()
    {

        $data = $this->ordermodel->orderview();
        return $data;
    }
   
    public function updatebill()
    {
      
        if ($this->ordermodel->updatebill($_POST)) {
            echo "succesfull";
        } else {
            echo "Something went wrong!";
        }
    }
    public function updateship()
    {
      
        if ($this->ordermodel->updateshipto($_POST)) {
            echo "succesfull";
        } else {
            echo "Something went wrong!";
        }
    }
    public function showadddressbill($order_id)
    {
        $data = $this->ordermodel->showaddressbill($order_id);
        return $data;
    }
    public function showaddressship($order_id)
    {
        $data = $this->ordermodel->showaddressship($order_id);
        return $data;
    }
    public function updateorderstatus()
    {
        if ($this->ordermodel->updateorderstatus($_POST)) {
            echo "succesfull";
        } else {
            echo "Something went wrong!";
        }
    }
    public function orderviewdetail($order_id)
    {
        $data = $this->ordermodel->orderviewdetail($order_id);
        return $data;
    }
    
}
