<?php
    require_once('koneksi.php');
    session_start();

    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $password = md5($password);
    
    $sql = "SELECT * FROM user
                WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {//cek apakah ada user dan pass yang sama
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Password'] = $row['Password'];
        $_SESSION['is_login'] = TRUE;
        header('location: penduduk.php');
    } else {
        $_SESSION['pesan'] = "Username atau Password Anda Salah";
        header('location: login.php');
    }
?>