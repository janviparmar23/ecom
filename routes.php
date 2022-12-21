

<?php

// include_once(__DIR__ . '/../includes/order.php');
// $admin= new order();
// $admin->showorder($_GET['id']);



if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $do = $_GET['do'];
    $order_id = $_GET['orderId'];

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
                include_once('includes/order.php');
                $admin = new order();
                $admin->ordercomplete($_GET['order_id']);
                if ($admin) {
                    echo 'succes';
                }
            } else
            if ($do == 'payment_failed') {
                include_once('includes/order.php');
                $admin = new order();
                $admin->cancelorder($_GET['order_id']);
            }
            break;
        case 'orderdetailview':
            if ($do == 'order') {

                include_once('views/orderlistview.php');
            }
            break;
        case 'order_details':
            if ($do == 'order_details') {
               
                include_once('views/order_details.php');
            }
         
            break;
    }
} else {
    include_once('views/homepage.php');
}

/*


order listing view
====================
order id
status
customer name(address)
order total amount
view button

order details
=====================
order id
customer name
status

bill to | ship to

products

ID | Product Name | Product Image | Qty | Price | Total 

order total : 

add field in ordrs table
create_at

*/