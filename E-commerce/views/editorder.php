<?php

include_once(__DIR__ . '/../includes/order.php');

$order = new order();
$orderviewdetail = $order->orderviewdetail($_GET['order_id']);
$addressbill = $order->showadddressbill($_GET['order_id']);
$addressship = $order->showaddressship($_GET['order_id']);

if (isset($_POST["submit"])) {
    $order->updatebill();
    $order->updateship();
}
if (isset($_POST["save"])) {
    $order->updateorderstatus();
}

?>
<form name="form1" method="POST" action="" enctype="multipart/form-data">
    <div>
        <table>
            <?php foreach ($orderviewdetail as $order) : ?>
                <tr>
                    <td>
                        <?php echo $order['order_id']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $order['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $order['pr_TOTAL']; ?>
                    </td>
                </tr>
                <tr>
                    <td><select name="type">
                        <?php
                        $statusList = ["pending", "complete", "cancel"];
                        foreach ($statusList as $status) {
                            $sel = "";
                            if ($order['status'] == $status) {
                                $sel = "selected";
                            }?>
                          
                            <option value="<?php echo $status; ?>" <?php echo $sel; ?>><?php echo $status; ?></option>
                           <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?> " />
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td><input type="submit" name="save" value="save" /></td>
            </tr>
        </table>
    </div>
</form>
<form name="form1" method="POST" action="" enctype="multipart/form-data">
    <div class="orderdetail">
        <table style="float : left">
            <tr>
                <td>Bill To:</td>
            </tr>
            <?php foreach ($addressbill as $billadd) : ?>
                <tr>
                    <td>
                        <input type="hidden" name="bid" value="<?php echo $billadd['ID']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="bname" value="<?php echo  $billadd['name']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="bemail" value="<?php echo  $billadd['email']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="bphone" value="<?php echo  $billadd['phone']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="baddress" value="<?php echo $billadd['address']; ?> " />
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table style="float : right ">
            <tr>
                <td>Ship To:</td>
            </tr>
            <?php foreach ($addressship as $shipadd) : ?>
                <tr>
                    <td>
                        <input type="hidden" name="sid" value="<?php echo $shipadd['ID']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="sname" value="<?php echo  $shipadd['name']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="semail" value="<?php echo  $shipadd['email']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="sphone" value="<?php echo  $shipadd['phone']; ?> " />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="saddress" value="<?php echo $shipadd['address']; ?> " />
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td>
                    <input type="submit" name="submit" value="submit">
                </td>
            </tr>
        </table>
    </div>
</form>