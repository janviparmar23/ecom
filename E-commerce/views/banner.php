<html>

<head>
</head>

<body>
    <?php
    include_once(__DIR__ . '/../includes/banner.php');
    $admin = new banner();
    $banner = $admin->show();
    if (isset($_POST["submit"])) {
        $admin->addbanner();
    }
    if (isset($_GET['task']) == "delete") {
        $admin->deletebanner($_GET['ID']);
    }
    ?>
    <form name="bannerform" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td> <select name="type">
                        <option value="Banner">Banner</option>
                        <option value="slider">Slider</option>
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <input type="file" name="files[]" multiple></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
        <?php foreach ($banner as $banner): ?>
        <table class="banner-image">
            <tr>
                <td>
                    <img src='/e-commerce/images/<?php echo $banner['Image_name']; ?>' class="myimg"
                        style="height : 150px ; width : 150px;" />
                </td>
            </tr>
            <tr>
                <td>
                    <a
                        href="/e-commerce/index.php?action=banner&do=showbanner&task=delete&ID=<?php echo $banner['ID']; ?>">Delete</a>
                </td>
            </tr>
        </table>
        <?php endforeach; ?>
</body>

</html>