<?php
    require_once('koneksidisek.php');

    $nik = $_GET['nik'];
    $sqlselect = "SELECT * FROM upload
                    WHERE nik = $nik";
    $result = mysqli_query($connect, $sqlselect);
    $row = mysqli_fetch_assoc($result);
    
    $target_dir = "images/";
    $target_file    = $target_dir.$row['foto'];
    if(!unlink($target_file)){
        echo "File cannot delete";
    } else {
        $sqldelete = "DELETE FROM upload
                        WHERE nik = $nik";
    
        mysqli_query($connect, $sqldelete);
        header('location: index.php');
    }
?>