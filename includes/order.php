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
       
        $orderId = $this->orderModel->orderdata($_POST);
   
        if ($orderId) {
            session_start();

            error_reporting(E_ALL);
            ini_set("display_errors", 1);

            $session = $_SESSION['products'];

            $this->orderModel->insertorderproducts($orderId, $session);

            $b = [];

            foreach ($session as $session) :
                $a = array(
                    'price_data' => [
                        'currency' => "INR",
                        'unit_amount' => $session['total'] * 100,
                        'product_data' => [
                            'name' => $session['Name'],
                        ]
                    ],
                    'quantity' => $session['qty']
                );

                array_push($b, $a);
            endforeach;

            $url = $_SESSION['order_id'];

            require __DIR__ . '/../vendor/autoload.php';

            \Stripe\Stripe::setApiKey('sk_test_51MGedMSJNRRGRporywkiOjf07lzepaJSXnEqGIKvw3cbrRl9WbwbOIvnOjE0XCJVAhoinUuWLx5iDj4iUEQBBhys00HdOC7qbs');

            $YOUR_DOMAIN = 'http://localhost:8888/Ecommerce';

            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $b,
                'mode' => 'payment',
                'success_url' => $YOUR_DOMAIN . '/?action=order&do=payment_sucess&order_id=' . $orderId,
                'cancel_url' => $YOUR_DOMAIN . '/?action=order&do=payment_failed&order_id=' . $orderId,
            ]);

            echo "succes_url";
            return $checkout_session->url;
        } else {
            echo "Something went wrong!";
        }
    }

    public function ordercomplete($orderId)
    {

    $data = $this->orderModel->ordercomplete($orderId);
       $products =  $_SESSION['products'] ;
       $a = [];
           if ($products) 
           {
               $a[] = $products;
           }
       if (isset($_SESSION['products'])) {
           $_SESSION['products'] = $a;
       }
     
    }
    public function cancelorder($orderId)
    {
        $data = $this->orderModel->cancelorder($orderId);
        return $data;
    }
    public function insertorderproducts()
    {

        if ($this->orderModel->orderdata($_POST)) {
        } else {
        }
    }
    public function orderlistingview()
    {
     
        $data = $this->orderModel->orderlistingview();
        return $data;
    }

    public function orderviewdatilfromorderid($orderId)
    {
       
        $data = $this->orderModel->orderviewdatilfromorderid($orderId);
        return $data;
    }
    public function detailsofadd($orderId)
    {
       
        $data = $this->orderModel->detailsofadd($orderId);
        return $data;
    }
    public function detailstoaddship($orderId)
    {
       
        $data = $this->orderModel->detailstoaddship($orderId);
        return $data;
    }
    public function productdetail($orderId)
    {
        
        $data = $this->orderModel->productdetail($orderId);
        return $data;
    }
    public function ordertotal($orderId)
    {
        $data = $this->orderModel->ordertotal($orderId);
        return $data;
    }
}
