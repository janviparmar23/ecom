<html>

<body>
    <?php
    include_once(__DIR__ . '/../includes/category.php');
    if ($_GET['ID']) {
        $admin = new category();
        $categorys = $admin->fetch_category();
        $category = $admin->showcategory($_GET['ID']);
        
    }
    if (isset($_POST['save']) && $_GET['task'] == "edit") { 
        $admin->editcategory($_GET['ID']);

    }
    ?>
    <form name="edit_category" method="POST" action="" enctype="multipart/form-data" class="categoryform">
        <center>
            <table class="categorytable">

                <?php if ($_GET['task'] == "edit"): ?>
                <tr>
                    <th colspan="2">Edit CATEGORY</th>
                </tr>
                <tr><td>
                    <input type="hidden" name = "ID" value = "<?php echo $category['ID']; ?>" required>
                </td></tr>
                <tr>
                    <td>Name : </td>
                    <td> <input type="text" name="name" value="<?php echo $category['Name']; ?>" required></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><input type="text" name="description" value="<?php echo $category['Description']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>parent ID: </td>
                    <td> <input type="text" name="parentid" value="<?php echo $category['Parent_id']; ?>" required></td>
                </tr>
                <tr>
                    <td> category :</td>
                    <td> <select name="category" id="category">
                            <option value=" "> new </option>
                            <?php foreach ($categorys as $cat): ?>
                            <option value=<?php echo $cat['ID']; ?>>
                                <?php echo $cat['Name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Image :</td>
                    <td><input type="file" name="image" required></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="action" value="edit" />
                        <input type="hidden" name="old_image" value= "<?php echo $category["Image"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="createddate" required></td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="modifydate" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="save" value="submit" />
                    </td>
                </tr>
                <?php endif; ?>
            </table>
        </center>
    </form>
</body>

</html>