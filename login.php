<!doctype html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <center>
    <h1>LOGIN</h1>
    <form action="submitlogin.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="Username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="Password" name="Password" required></td>
        </tr>
    </table>
    <input type="submit" value="Login"><br>
    Belum Memiliki Akun? <a href="register.php">register -></a>
    </form>
    </center>
</body>
</html>