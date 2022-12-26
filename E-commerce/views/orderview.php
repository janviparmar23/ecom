<?php

// die("hey");
include_once(__DIR__ . '/../includes/order.php');
$admin = new order();
$orderdetail = $admin->showorderdetail();
?>

<body>
    <table border="1">
        <tr>
            <td>order ID </td>
            <td> customer ID</td>
            <td> Status</td>
            <td> Final Total</td>
        </tr>

        <?php foreach ($orderdetail as $order) : ?>
            <tr>
                <td>
                    <?php echo $order['order_id']; ?>
                </td>
                <td>
                    <?php echo $order['customer_id']; ?>
                </td>
               
                <td>
                <?php echo $order['status']; ?>
                </td>
                <td>
                    <?php echo $order['pr_TOTAL']; ?>
                </td>
                <td>
                <td><a href="index.php?action=editorder&do=editorder&order_id=<?php echo $order['order_id']; ?>">Detail</a></td>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
   