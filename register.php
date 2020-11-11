<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Register</title>
</head>
<body>
    <center>
        <h1>REGISTER</h1>
    <form action="submitregister.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="Username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="Password" name="Password" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="Password" name="confirm_password" required></td>
            </tr>
        </table>
        <input type="submit" value="Register"><br>
        Sudah Memiliki Akun? <a href="login.php">Login -></a>
    </form>
    </center>
</body>
</html>