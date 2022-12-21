<?php
include_once(__DIR__ . '/../includes/order.php');
$order = new order();
$data = $order->orderlistingview();

?>
<table >
    <tr>
        <th>
            Order ID
        </th>
        <th>
            Customer Name
        </th>
        <th>
            Order Status
        </th>
        <th>
            Product Total
        </th>
    </tr>
    <?php foreach ($data as $orderview) : ?>
        <tr>
            <td><?php echo $orderview['order_id']; ?></td>
            <td><?php echo $orderview['name']; ?></td>
            <td><?php echo $orderview['status']; ?></td>
            <td><?php echo $orderview['pr_TOTAL']; ?></td>
            <td><a href="index.php?action=order_details&do=order_details&order_id=<?php echo $orderview['order_id']; ?>">Detail</a></td>
        </tr>
    <?php endforeach; ?>
   <tr><td>

    </td>
    </tr>

</table>