<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "praktikum7";
    $connect = mysqli_connect($host, $username, $password, $database);

    if(!$connect){
        echo "Connecting Failed";
    }

?>