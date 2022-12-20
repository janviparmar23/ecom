<?php

include_once(__DIR__ . '/../models/product.php');
class product
{
    private $con;
    private $productModel;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
        $this->productModel = new productModel();
    }
    public function addproduct()
    {
        if ($this->productModel->add($_POST)) {
            echo "add product successfully!";
        } else {
            echo "Something went wrong!";
        }
    }
    public function showproduct()
    {
        $data = $this->productModel->show();
        return $data;
    }
    public function addproductimage()
    {
        if ($this->productModel->addproductImage($_POST)) {
            echo "add product successfully!";
        } else {
            echo "Something went wrong!";
        }
    }
}
?>