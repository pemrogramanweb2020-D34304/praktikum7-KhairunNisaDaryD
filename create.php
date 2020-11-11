<?php
    require_once("koneksi.php");

    $nama = $_POST['Nama'];
    $tanggal_lahir = $_POST['Tanggal Lahir'];
    $tanggal_lahir = date('Y-m-d', strtotime($tanggal_lahir));
    $tempat_lahir = $_POST['Tempat Lahir'];

    $namafile = $_FILES['Foto']['nama'];
    $namafileserver = $_FILES['Foto']['tmp_nama'];
    $target_dir     = "image/";
    $target_file    = $target_dir.basename($_FILES["Foto"]["nama"]);
    $tipefile = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES['Foto']['size'] > 1500000 or $tipefile != "jpeg" and $tipefile != "jpg"){
        echo "Ukuran File Terlalu Besar";
        header('location: form_create.php');
    } else {
        if (move_uploaded_file($_FILES["Foto"]["tmp_nama"], $target_file)) {
            $sql = "INSERT INTO upload(NIK, Nama, Tanggal Lahir, Tempat Lahir, Foto)
                        VALUES (NULL,'$nama','$tanggal_lahir','$tempat_lahir','$namafile')";
            mysqli_query($connect, $sql);            
            echo "The file ". basename( $_FILES['Foto']['nama']). " Berhasil Terupload.";
            header('location: penduduk.php');
        } else {
            echo "Maaf, File Gagal Terupload.";
        }   
    }

    
?>