<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body class = "container">
    <header>
   
    </header>
    <main>
        <content>
           
                <form name="LOGIN_FORM" method="POST" action="" class="myform">         
                    <center>
                        <table class="admintable">
                            <tr>
                                <th class="font"> ADMIN LOGIN_FORM
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2"> <input type="text" name="emailid" placeholder="Enter EmailID" required></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="password" name="password" placeholder="Enter Password" required></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <center><input type="submit" name="submit" value="Submit"  class="submit"></center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <center>If not register ? <a href ="Registration.php ">Register here </a></center>
                                </td>
                            </tr>
                        </table>
                    </center>
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
</body>

</html>