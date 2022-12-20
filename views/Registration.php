<form name="user_registrtion" method="POST" action="" enctype="multipart/form-data">
    <center>
        <h1>USER REGISTRATION FORM</h1>

        <table>
            <tr>
                <td>
                    <input type="text" name="emailid" placeholder="Email" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="Password" name="password" placeholder="Password" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="firstname" placeholder="First Name" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="lastname" placeholder="Last Name" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Current_date" />
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" name="submit" value="submit" />
                </td>
            </tr>
        </table>
    </center>
</form>
<?php

include_once('includes/user.php');

if (isset($_POST["submit"])) {
    $user = new Registration();
    $user->doRegister();
}
?>