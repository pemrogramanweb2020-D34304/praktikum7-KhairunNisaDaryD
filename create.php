<?php
    require_once("koneksidisek.php");

    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal_lahir'];
    $tanggal = date('Y-m-d', strtotime($tanggal));
    $tempat = $_POST['tempat_lahir'];

    $namafile = $_FILES['foto']['name'];
    $namafileserver = $_FILES['foto']['tmp_name'];
    $target_dir     = "images/";
    $target_file    = $target_dir.basename($_FILES["foto"]["name"]);
    $tipefile = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES['foto']['size'] > 1500000 or $tipefile != "jpeg" and $tipefile != "jpg"){
        echo "File terlalu besar";
        header('location: form_create.php');
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO upload(nik, nama, tanggal_lahir, tempat_lahir, foto)
                        VALUES (NULL,'$nama','$tanggal','$tempat','$namafile')";
            mysqli_query($connect, $sql);            
            echo "The file ". basename( $_FILES['foto']['name']). " has been uploaded.";
            header('location: index.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }   
    }

    
?>