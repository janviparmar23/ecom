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
    public function showproduct()
    {
        $data = $this->productModel->show();
        return $data;
    }
    public function storedata(){
        if ($this->productModel->storedata()) {
          
        } else {
            echo "Something went wrong!";
        }
    }

    public function removeproductfromcart()
    {
        if($this->productModel->removeproductfromcart($_POST))
        {
           
        }else{
            echo " error";
        }
    }
    public function ADDTOCART()
    {
        $b=$this->productModel->ADDTOCART();
        return $b;
    }
    public function addaddress()
    {
        if($this->productModel->addaddress($_POST))
        {
           
        }else{
            echo " error";
        }
    }
    
    
    

}
?>