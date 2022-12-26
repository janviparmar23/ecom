<head>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<?php

include_once(__DIR__ . '/../includes/product.php');
$admin = new product();
if (isset($_POST['id'])) {
    $admin->removeproductfromcart();
}
if (isset($_POST['save'])) {
    $admin->addaddress();
}
$admin->ADDTOCART();
$session = $_SESSION['products'];
echo "<pre>";
print_r($_SESSION);

?>
<div class="address">
    <form name="" method="POST" action="" enctype="multipart/form-data">
        <table class="billto">
            <tr>
                <th class="tablehead">BILL TO :</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="name" placeholder="enter name" class="input-text-register" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" placeholder=" enter emailid" class="input-text-register" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="phoneno" placeholder="enter phonenumber" class="input-text-register" />
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="address" placeholder="enter address" class="input-text-register" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="type" value="bill" />
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="same_as_bill" value="0">
                    <input type="checkbox" ID="forsame" name="same_as_bill" value="1">
                    <label for="forsame"> same_as_bill</label><br>
                </td>
            </tr>
        </table>
        <?php
        if (isset($_POST['same_as_bill'])) {
        ?>
            <table class="shipto">
                <tr>
                    <th class="tablehead">SHIP TO : </th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="enter name" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="email" placeholder=" enter emailid" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="phoneno" placeholder="enter phonenumber" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="same_as_bill" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="address" placeholder="enter address" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="stype" value="shipto" />
                </tr>
            </table>
        <?php
        } else {
        ?>
            <table class="shipto">
                <tr>
                    <th class="tablehead">SHIP TO : </th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="sname" placeholder="enter name" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="semail" placeholder=" enter emailid" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="sphoneno" placeholder="enter phonenumber" class="input-text-register" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="saddress" placeholder="enter address" class="input-text-register" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="shipto" value="0">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="stype" value="shipto" />
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="save" value="save" class="btn btn-checkout"/>
                    </td>
                </tr>
            </table>
        <?php
        }
        ?>
</div>
</form>
<div class="carttable cart-table">
    <h3 class="scart"> Shopping cart</h3>
    <hr class="hr">
    <table>
        <tr>
            <th colspan="2">Products Details:</th>
            <th> Quality </th>
            <th>price</th>
            <th>Total</th>
        </tr>


        <?php foreach ($session as $session) : ?>
            <tr class="carttr">
                <td class="carttd"> <img src='../E-commerce/images/<?php echo $session['image']; ?>' class="mycartimg" /></td>
                <td class="carttd"><?php echo $session['Name'];  ?></td>


                <td class="carttd"><?php echo $session['qty']; ?></td>
                <td class="carttd"><?php echo $session['Price']; ?></td>
                <td class="carttd"><?php echo $session['total']; ?> </td>

                <td class="carttd">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $session['ID']; ?>" />
                        <button class="btn btn-delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<div class="summary cart-table">
    <h3 class="scart">Summary </h3>
    <hr class="hr">
    <table>
        <tr>
            <th></th>
        </tr>
        <tr>
            <td class="carttd">Total is: </td>
            <td class="carttd"><?php echo $_SESSION['Total']; ?></td>
        </tr>
        <tr>
            <td>
                <div>
                    <?php
                    include_once(__DIR__ . '/../includes/order.php');
                    $order = new order();
                    if (isset($_POST['checkout'])) {
                        $url = $order->orderdata();
                        echo '<script>window.location="' . $url . '"</script>';
                    }

                    ?>
                    <form name="" method="POST" action="" enctype="multipart/form-data">
                        <table>

                            <tr>
                                <input type="hidden" name="cutomer_id" value="<?php echo $_SESSION['ID']; ?>" />
                            </tr>
                            <tr>
                                <input type="hidden" name="bill_to" value="<?php echo $_SESSION['billto'] ?> " />
                            </tr>
                            <tr>
                                <input type="hidden" name="shipto" value="<?php echo $_SESSION['shipto'] ?> " />
                            </tr>
                            <tr>
                                <input type="hidden" name="producttotal" value="<?php echo $_SESSION['Total'] ?> " />
                            </tr>
                            <tr>
                                <input type="hidden" name="status" value="pending" />
                            </tr>
                            <tr>
                                <td class="summarytd">
                                    <input type="submit" name="checkout" value="checkout" class="btn btn-checkout" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</div>