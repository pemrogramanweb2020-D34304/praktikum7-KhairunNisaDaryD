<?php
    require_once('koneksidisek.php');

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal_lahir'];
    $tanggal = date('Y-m-d', strtotime($tanggal));
    $tempat = $_POST['tempat_lahir'];
    $file = $_FILES['foto']['name'];
    $sqlselect = "SELECT * FROM upload
                    WHERE nik = $nik";
    $result = mysqli_query($connect, $sqlselect);
    $row = mysqli_fetch_assoc($result);
    $target_dir = "images/";
    $target_file    = $target_dir.basename($file);
    if($file == NULL){
        $sqlupdate = "UPDATE upload 
                        SET nik='$nik',nama='$nama',tanggal_lahir='$tanggal',tempat_lahir='$tempat'
                        WHERE nik=$nik";
        mysqli_query($connect, $sqlupdate);
        header("location: index.php");
    }else {
        if ($_FILES['foto']['size'] > 1500000 or $tipefile != "jpeg" and $tipefile != "jpg"){
            echo "File terlalu besar";
            header("location: form_update.php?nik=$nik");
        } else {
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            unlink($target_dir.$row['foto']);
        
            $sqlupdate = "UPDATE upload 
                            SET nik='$nik',nama='$nama',tanggal_lahir='$tanggal',tempat_lahir='$tempat',foto='$file'
                            WHERE nik=$nik";
            mysqli_query($connect, $sqlupdate);
            header("location: index.php");
        }
    }