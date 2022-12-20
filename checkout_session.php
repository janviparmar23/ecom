<?php
session_start();
$session = $_SESSION['products'];
$b=[];

foreach($session as $session):
    $a= array(
        'price_data' => [
            'currency' => "INR",
            'unit_amount' => $session['total'],
            'product_data' => [
                'name' => $session['Name'],
            ],
            'quantity' => $session['qty'],
        ]);
    
    array_push($b,$a);
    endforeach;
   
   
    
    echo "<pre>";
    print_r($x);
    print_r($b);
    
    die;

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51MGedMSJNRRGRporywkiOjf07lzepaJSXnEqGIKvw3cbrRl9WbwbOIvnOjE0XCJVAhoinUuWLx5iDj4iUEQBBhys00HdOC7qbs');

$YOUR_DOMAIN = 'http://localhost:8888/Ecommerce';

$checkout_session = \Stripe\Checkout\Session::create([

    'line_items' => [

        [
            $b;
        ]
    ],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/action=order&do=payment_sucess',
    'cancel_url' => $YOUR_DOMAIN . '/action=order&do=payment_failed',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>