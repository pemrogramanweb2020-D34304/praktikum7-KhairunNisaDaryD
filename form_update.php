<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>FORM CREATE</title>
</head>
<body>
<?php
    require_once('koneksi.php');

    $nik = $_GET['NIK'];
    $sql = "SELECT * FROM upload
                WHERE NIK = $nik";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
?>
    <h1>FORM UPDATE DATA KEPENDUDUKAN</h1>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td>NIK</td>
                <td><input type="text" name="NIK" value="<?php echo $nik;?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $row['Nama'];?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="Tanggal Lahir" value="<?php echo $row['Tanggal Lahir'];?>" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="Tempat Lahir" value="<?php echo $row['Tempat Lahir'];?>" required></td>
            </tr>
            <tr>
                <td>Foto (max = 1,5MB)</td>
                <td><input type="file" name="Foto" id="Foto" ></td>
            </tr>
        </table>
        <input type="submit" value="UPDATE" />
    </form>
</body>
</html>