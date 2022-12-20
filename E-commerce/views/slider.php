<html>

<head>
</head>

<body>
    <?php
    include_once(__DIR__ . '/../includes/banner.php');
    $admin = new banner();
    $slider = $admin->slider();
    ?>

<?php foreach ($slider as $slider): ?>
        <table class="banner-image">
            <tr>
                <td>
                    <img src='/e-commerce/images/<?php echo $slider['Image_name']; ?>' class="myimg"
                        style="height : 150px ; width : 150px;" />
                </td>
            </tr>
            <tr>
                <td>
                    <a
                        href="/e-commerce/index.php?action=banner&do=showbanner&task=delete&ID=<?php echo $slider['ID']; ?>">Delete</a>
                </td>
            </tr>
        </table>
        <?php endforeach; ?>
</body>

</html>