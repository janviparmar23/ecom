<?php
include_once(__DIR__ . '/../includes/banner.php');
$admin = new banner();
$banner = $admin->show();
$slider = $admin->slider();

?>
<div class="homepage-slider">
<div class="slider slider-table">
    <?php foreach ($slider as $slider) : ?>

        <img src='/ecommerce/E-commerce/images/<?php echo $slider['Image_name']; ?>' class="slider-image" />

    <?php endforeach; ?>
</div>
    </div>
<script>
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
</script>
<div class= "sidebarproduct">
<table><tr><th class="filterth">Filter:</th></tr></table>

</div>
<div class="product">
    <?php
    include_once(__DIR__ . '/../includes/product.php');
    $admin = new product();
    $product = $admin->showproduct();

    if (isset($_POST["submit"])) {
        if (isset($_SESSION['emailid'])) {
            if ($admin->storedata()) {
                echo "added to cart";
            } else {
                echo "failed";
            }
        } else {
            $url = "index.php?action=login&do=login ";
            echo '<script>window.location="' . $url . '"</script>';
            //Redirect('index.php?action=login&do=login', false);
        }
    }
    ?>
    <div class="product-style">
    <?php foreach ($product as $product) : ?>
        <form method="post" enctype="multipart/form-data" class="product-style">
            <table class="product-home" >
                <tr>
                    <td>
                        <img src='/ecommerce/E-commerce/images/<?php echo $product['image']; ?>' class="product-home-image" />
                    </td>
                <tr>
                    <td class="productprice">
                        Price :
                        <?php echo $product['Price']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="productname">
                        Name :
                        <?php echo $product['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="hidden" name="name" value="<?php echo $product['name']; ?>" /></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="ID" value="<?php echo $product['ID']; ?>" /></td>
                </tr>
                <tr>
                    <td><input type="number" name="qty" value="<?php echo $product['qty']; ?>" /></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="image" value="<?php echo $product['image']; ?>" /></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="price" value="<?php echo $product['Price']; ?>" /></td>
                </tr>

                <tr>
                    <td ><input type="submit" name="submit" value="add cart" class="btn btn-addcart"></a></td>
                </tr>
            </table>
        </form>
    <?php endforeach; ?>
    </div>