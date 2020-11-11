<?php
    require_once("koneksi.php");

    $username = $_POST["Username"];
    $password = md5($_POST["Password"]);
    $confirmpassword = md5($_POST["confirm_password"]);

    if ($password != $confirmpassword) {
        echo "<center>";
        echo "<h2>Register Failed</h2><br>";
        echo "<a href='register.php'><- Back</a>";
        echo "</center>";
    } else {
        $sql = "INSERT INTO user(id_user, Username, Password)
                    VALUES ('NULL','$username','$password')";
        $result = mysqli_query($connect, $sql);
        header("location: login.php");      
    }
?>