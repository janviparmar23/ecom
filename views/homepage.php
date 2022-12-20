<?php
include_once(__DIR__ . '/../includes/banner.php');
$admin = new banner();
$banner = $admin->show();
$slider = $admin->slider();
?>
<div class="sidebar">
   <!-- <?php foreach ($banner as $banner): ?>
    <table class="banner-image">
        <tr>
            <td>
                <img src='/ecommerce/E-commerce/images/<?php echo $banner['Image_name']; ?>' class="banner-image" />
            </td>
        </tr>
    </table>
    <?php endforeach; ?>-->
</div>
<div class="slider">
    <?php foreach ($slider as $slider): ?>
    <table class="banner-image">
        <tr>
            <td>
                <img src='/ecommerce/E-commerce/images/<?php echo $slider['Image_name']; ?>' class="slider-image" />
            </td>
        </tr>
    </table>
    <?php endforeach; ?>
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
<div>

    <?php
    include_once(__DIR__ . '/../includes/product.php');
    $admin = new product();
    $product = $admin->showproduct();
    if (isset($_POST["submit"])) {

      $admin->storedata();
    }
   

    ?>
    <?php foreach ($product as $product): ?>
    <form method="post" enctype="multipart/form-data" class="product-image">
        <table class="product-image">
            <tr>
                <td>
                    <img src='/ecommerce/E-commerce/images/<?php echo $product['image']; ?>' class="banner-image" />
                </td>
            <tr>
                <td>
                    Price :
                    <?php echo $product['Price']; ?>
                </td>
            </tr>
            <tr>
                <td>
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
                <td><input type="submit" name="submit" value="add cart"></a></td>
            </tr>
        </table>
    </form>
    <?php endforeach; ?>

   