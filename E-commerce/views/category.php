<html>

<head>
</head>

<body>
    <?php
    include_once(__DIR__ . '/../includes/category.php');
    $admin = new category();
    $categorys = $admin->fetch_category();
    if (isset($_POST["submit"])) {

        $admin->addcategory();
    }
    ?>
    <form name="Add_category" method="POST" action="" enctype="multipart/form-data" class="categoryform">
        <center>
            <table class="categorytable">
                <tr>
                    <th colspan="2">ADD CATEGORY</th>
                </tr>
                <tr>
                  
                    <td> <input type="text" name="name" placeholder="Category name" required></td>
                </tr>
                <tr>
                   
                    <td><input type="text" name="description" placeholder="Category Description" required></td>
                </tr>
                <tr>

                    <td> <input type="hidden" name="parentid" required></td>
                </tr>
                <tr>
                    <td> Select Category :<select name="category" id="category">
                            <option value=" "> new </option>
                            <?php foreach ($categorys as $category): ?>
                            <option value=<?php echo $category['ID']; ?>>
                                <?php echo $category['Name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Image:<input type="file" name="image" required></td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="createddate" required></td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="modifydate" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="submit" />
                    </td>
                </tr>
            </table>
        </center>
    </form>
    <?php
    include_once(__DIR__ . '/../includes/category.php');
    $admin = new category();
    $category = $admin->fetch_category();
    //echo "<pre>";
   // print_r($category);
    //die;
    if (isset($_GET['task']) == "delete") {
        $admin->deletecategory($_GET['ID']);
    }
    ?>
    <table border="1" class="showcatgeory">
        <?php foreach ($category as $category): ?>
        <tr>
            <td>
                <?php echo $category['ID']; ?>
            </td>
            <td>
                <?php echo $category['Name']; ?>
            </td>
            <td>
               <?php echo $category['parent_name']; ?>
            </td>
            <td>
                <a
                    href="/e-commerce/index.php?action=editcategory&do=showcategory&task=edit&ID=<?php echo $category['ID']; ?>">edit</a>
            </td>
            <td>
                <a
                    href="/e-commerce/index.php?action=category&do=showcategory&task=delete&ID=<?php echo $category['ID']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>