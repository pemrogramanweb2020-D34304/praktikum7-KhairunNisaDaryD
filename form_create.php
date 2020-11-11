<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>FORM CREATE</title>
</head>
<body>
    <h1>FORM DATA KEPENDUDUKAN</h1>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempat_lahir" placeholder="Tempat Lahir"required></td>
            </tr>
            <tr>
                <td>Foto (max = 1,5MB)</td>
                <td><input type="file" name="foto" id="foto" required></td>
            </tr>
        </table>
        <input type="submit" value="UPLOAD" />
    </form>
</body>
</html>