<?php
    require_once('koneksi.php');

    $nik = $_POST['NIK'];
    $nama = $_POST['Nama'];
    $tanggal_lahir = $_POST['Tanggal Lahir'];
    $tanggal_lahir = date('Y-m-d', strtotime($tanggal_lahir));
    $tempat_lahir = $_POST['Tempat Lahir'];
    $file = $_FILES['Foto']['nama'];
    $sqlselect = "SELECT * FROM upload
                    WHERE NIK = $nik";
    $result = mysqli_query($connect, $sqlselect);
    $row = mysqli_fetch_assoc($result);
    $target_dir = "image/";
    $target_file    = $target_dir.basename($file);
    if($file == NULL){
        $sqlupdate = "UPDATE upload 
                        SET NIK='$nik',Nama='$nama',Tanggal Lahir='$tanggal_lahir',Tempat Lahir='$tempat_lahir'
                        WHERE NIK=$nik";
        mysqli_query($connect, $sqlupdate);
        header("location: penduduk.php");
    }else {
        if ($_FILES['Foto']['size'] > 1500000 or $tipefile != "jpeg" and $tipefile != "jpg"){
            echo "File Anda Terlalu Besar";
            header("location: form_update.php?nik=$nik");
        } else {
            move_uploaded_file($_FILES["Foto"]["tmp_nama"], $target_file);
            unlink($target_dir.$row['Foto']);
        
            $sqlupdate = "UPDATE upload 
                            SET NIK='$nik',Nama='$nama',Tanggal Lahir='$tanggal_lahir',Tempat Lahir='$tempat_lahir',Foto='$file'
                            WHERE NIK=$nik";
            mysqli_query($connect, $sqlupdate);
            header("location: penduduk.php");
        }
    }