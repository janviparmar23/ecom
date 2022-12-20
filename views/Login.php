<form name="LOGIN_FORM" method="POST" action="">
    <center>
        <h1>LOGIN FORM</h1>
        <table>

            <tr>
                <td> <input type="text" name="emailid" placeholder="Enter EmailID" required></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Enter Password" required></td>
            </tr>
            <tr>
                <td>
                    <center><input type="submit" name="submit" value="submit"></center>
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