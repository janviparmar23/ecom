<html>

<head>
</head>

<body>
    <header>
    </header>
    <main>
        <content>
            <form name="user_registrtion" method="POST" action="" enctype="multipart/form-data">
                <h1><b>USER REGISTRATION FORM</b></h1>
                <table>
                    <tr>
                        <td>
                            EmailId:<input type="text" name="emailid" placeholder="Email" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:<input type="Password" name="password" placeholder="Password" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Firstname:<input type="text" name="firstname" placeholder="First Name" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lastname:<input type="text" name="lastname" placeholder="Last Name" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="Current_date"  />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="submit" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php

            include_once('includes/user.php');

            if (isset($_POST["submit"])) {
                $user = new Registration();
                $user->doRegister();
            }
            ?>
        </content>
    </main>
    <footer>
    </footer>

</body>

</html>