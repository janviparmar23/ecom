<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $do = $_GET['do'];


    switch ($action) {
        case 'login':
            if ($do == 'login') {
                include_once('views/Login.php');
            }
            break;
        case 'register':
            if ($do == 'register') {
                include_once('views/Registration.php');
            }
            break;
        case 'cart':
            if ($do == 'docart') {
                echo "succesfull";
                include_once('views/cart.php');
            }
            break;
        case 'contact':
            if ($do == 'docontact') {
                include_once('views/contactus.php');
            }
            break;
        case 'aboutus':
            if ($do == 'aboutus') {
                include_once('views/aboutus.php');
            }
            break;
        case 'order':
            if ($do == 'payment_sucess') {
                include_once(__DIR__ . '/../includes/order.php');
                $admin = new order();
                $admin->ordercomplete();
            }
        else
            if ($do == 'payment_failed') {
                include_once(__DIR__ . '/../includes/order.php');
                $admin = new order();
                $admin->cancelorder();
            }
    }
} else {
    include_once('views/homepage.php');
}



//localhost:8888/Ecommerce/action=order&do=payment_sucess&order_id=
