<?php

include_once(__DIR__ . '/../includes/order.php');
$order = new order();
$data = $order->orderviewdatilfromorderid($_GET['order_id']);
$bill = $order->detailsofadd($_GET['order_id']);
$ship = $order->detailstoaddship($_GET['order_id']);
$product_detail = $order->productdetail($_GET['order_id']);
$order_detail = $order->ordertotal(($_GET['order_id']));

?>
<div>
    <table border="1">
        <?php foreach ($data as $orderdata): ?>
        <tr>
            <th colspan="2">
                Order details:
            </th>
        </tr>
        <tr>
            <td>order id :</td>
            <td><?php echo $orderdata['order_id']; ?></td>
        </tr>
        <tr>
            <td>customer name :</td>
            <td><?php echo $orderdata['name']; ?></td>
        </tr>
        <tr>
            <td>order status :</td>
            <td><?php echo $orderdata['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div>
    <table class="billto">
        <tr>
            <th class="tablehead">Bill to:</th>
        </tr>
        <?php foreach ($bill as $billdata) : ?>
            <tr>
                <td>
                    <?php echo $billdata['name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $billdata['email']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $billdata['phone']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $billdata['address']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tr>
    </table>
</div>
<div>
    <table class="shipto">
        <tr>
            <th class="tablehead">Ship to:</th>
        </tr>
        <?php foreach ($ship as $shipdata) : ?>
            <tr>
                <td>
                    <?php echo $shipdata['name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $shipdata['email']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $shipdata['phone']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $shipdata['address']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tr>
    </table>

</div>
Product details:
<table border="1">

    <tr>
        <th>
            product ID
        </th>
        <th>
            Product Name
        </th>
        <th>
            Product quantity
        </th>
        <th>
            Product price
        </th>
        <th>
            Product Image
        </th>
        <th>
            Product total
        </th>
    </tr>
    <?php foreach ($product_detail as $pd) : ?>
        <tr>
            <td><?php echo $pd['Product_id']; ?></td>

            <td><?php echo $pd['product_name']; ?></td>

            <td><?php echo $pd['product_quanitity']; ?></td>

            <td><?php echo $pd['product_price']; ?></td>

            <td><?php echo $pd['product_image']; ?></td>

            <td><?php echo $pd['product_total']; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <?php foreach($order_detail as $od): ?>
        <td colspan = "6">order total : <?php echo $od['pr_TOTAL']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>