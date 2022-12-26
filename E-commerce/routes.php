<?php

$action = $_GET['action']; 
$do = $_GET['do'];

switch ($action) {
    case 'dashboard':
        if ($do == 'showdashboar') {
            include_once('views/dashboard.php');
        }
        break;
    case 'category':
        if ($do == 'showcategory') {
            include_once('views/category.php');
        }
        break;
    case 'banner':
        if ($do == 'showbanner') {
            include_once('views/banner.php');
        }
        break;
    case 'slider':
        if ($do == 'showslider') {
            include_once('views/slider.php');
        }
        break;
    case 'product':
        if ($do == 'showproduct') {
            include_once('views/product.php');
        }
        break;
    case  'editcategory';
    if($do == 'showcategory' ){
            include_once('views/category_edit.php');
            break;
    }
    case  'order':
        if($do == 'showorder' ){
            include_once('views/orderview.php');
            break;
    }
    case  'editorder':
        if($do == 'editorder' ){
            include_once('views/editorder.php');
            break;
    }

}
?>