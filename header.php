
<div class="top-bar">
<?php


if (isset($_SESSION['emailid'])) {
?>
     <p class="pclass"><a href="index.php?action=logout&do=logout" class="top-bar "> Logout</a><p>
       
<?php
} else {
?>
     <p class="pclass"><i class="fas fa fa-user-tie fa-user"></i><a href="index.php?action=login&do=login" class="top-bar "> Login </a>
        <a href="index.php?action=register&do=register" class="top-bar ">Registration</a>
    </p>

<?php
}
?>

</div>
<!-- <div class="top-bar">
    <p class="pclass"><i class="fas fa fa-user-tie fa-user"></i><a href="index.php?action=login&do=login" class="top-bar "> Login </a>
        <a href="index.php?action=register&do=register" class="top-bar ">Registration</a>
    </p>
</div> -->

<div class="second-bar">
    <div class="logo"> <span class="logo">E-com</span>
    </div>
</div>
<div class="third-bar">
    <nav>
        <ul class="my-menu">
            <li><a href="index.php" class="third-bar">Home</a></li>
            <li><a href="index.php?action=aboutus&do=aboutus" class="third-bar">About Us</a></li>
            <li><a href="" class="third-bar">Men's Collection</a></li>
            <li><a href="" class="third-bar">Women's Collection</a></li>
            <?php if(isset($_SESSION['emailid']))  
            {
                ?>
<li><a href="index.php?action=orderdetailview&do=order" class="third-bar">Order</a></li>
                <?php
            }
            ?>
            
            <li><a href="index.php?action=contact&do=docontact" class="third-bar">Contact Us</a></li>
            <li><a href="index.php?action=cart&do=docart" class=""><i class="fas fa fa-shopping-cart fa-cart"></i></a></li>
        </ul>
    </nav>

</div>