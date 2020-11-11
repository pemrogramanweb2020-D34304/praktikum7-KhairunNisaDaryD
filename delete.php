<?php
    require_once('koneksi.php');

    $nik = $_GET['NIK'];
    $sqlselect = "SELECT * FROM upload
                    WHERE NIK = $nik";
    $result = mysqli_query($connect, $sqlselect);
    $row = mysqli_fetch_assoc($result);
    
    $target_dir = "image/";
    $target_file    = $target_dir.$row['Foto'];
    if(!unlink($target_file)){
        echo "File Tidak Dapat Di Hapus";
    } else {
        $sqldelete = "DELETE FROM upload
                        WHERE NIK = $nik";
    
        mysqli_query($connect, $sqldelete);
        header('location: penduduk.php');
    }
?>