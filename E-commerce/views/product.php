<html>

<head></head>

<body>
    <?php
    include_once(__DIR__ . '/../includes/product.php');
    $admin = new product();
    $product = $admin->showproduct();

    if (isset($_POST["submit"])) {
        $admin->addproduct();
    }
    if (isset($_POST["upload"])) {
        $admin->addproductimage();
    }
    ?>
    <form name="Add_product" method="POST" action="" enctype="multipart/form-data" class="categoryform">
        <center>
            <table>
                <tr>
                    <td><input type="text" name="name" placeholder="product name" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="description" placeholder="product description" required>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="alias" placeholder="product alias" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="qty" placeholder="product qty" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="price" placeholder="product price" required></td>
                </tr>
                <tr>
                    <td><select name="type">
                            <option value="0">Publish</option>
                            <option value="1">Not publish</option>
                            </option>
                        </select></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="modifydate" placeholder="modifydate" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit"></td>
                </tr>
            </table>
        </center>
    </form>
    <form name="add_image_product" method="POST" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td><input type="file" name="files[]" multiple></td>
            </tr>
            <tr>
                <td> <select name="type" id="product">
                        <?php foreach ($product as $product): ?>
                        <option value=<?php echo $product['ID']; ?>>
                            <?php echo $product['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="upload" /></td>
            </tr>
        </table>
    </form>
    <?php //echo($admin->addproductimage());?>
</body>

</html>