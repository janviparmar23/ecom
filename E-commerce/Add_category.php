<html>

<head>
</head>

<body>
    <header>

    </header>
    <main>
        <content>
            <?php
            session_start();
            include_once('includes/category.php');
            $admin = new category();
            $categorys = $admin->fetch_category();
            if (isset($_POST["submit"])) {

                $admin->addcategory();
            }
            
            ?>
            <form name="Add_category" method="POST" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Name : <input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td>Description <input type="text" name="description" required></td>
                    </tr>
                    <tr>
                        <td> <input type="hidden" name="parentid" required></td>
                    </tr>
                    <tr>
                        <td>Choose category :
                            <select name="category" id="category">
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
                        <td>Image<input type="file" name="image" required></td>
                    </tr>
                    <tr>
                        <td> <input type="hidden" name="createddate" required></td>
                    </tr>
                    <tr>
                        <td> <input type="hidden" name="modifydate" required></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="submit" />
                        </td>
                    </tr>
                </table>
            </form>
        </content>
    </main>
    <footer>
    </footer>
</body>

</html>