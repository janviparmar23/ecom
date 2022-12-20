<html>

<head>
    <title>LOGIN </title>
</head>

<body>
    <header>

    </header>
    <main>
        <content>
            <form name="LOGIN_FORM" method="POST" action="">

                <h1>LOGIN FORM</h1>
                <table>
                    <tr>
                        <td>Enter EmailID: <input type="text" name="emailid" placeholder="Enter EmailID" required></td>
                    </tr>
                    <tr>
                        <td>Enter Password:<input type="password" name="password" placeholder="Enter Password" required></td>
                    </tr>
                    <tr>
                        <td>
                            <center><input type="submit" name="submit" value="submit"></center>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            include_once('includes/user.php');
            if (isset($_POST["submit"])) {
                $user = new Registration();
                $user->doLogin();
            }
            ?>
        </content>
    </main>

    <footer>
    </footer>
    </div>
</body>

</html>