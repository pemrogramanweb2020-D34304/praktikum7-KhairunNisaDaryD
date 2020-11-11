<?php
    require_once("koneksidisek.php");
    session_start();
    if (!isset($_SESSION['is_login'])){
        $_SESSION['pesan'] = "Halaman tidak bisa diakses";
        header('location: login.php');
    }
    
    $sql = "SELECT * FROM upload";
    $result = mysqli_query($connect, $sql);

    echo "<h1>DATA KEPENDUDUKAN</h1><br>";
    echo "<a href='form_create.php'><button>TAMBAH DATA</button></a><br>";
    echo "<table border=1>";
    echo "<thead>
          <th>NIK</th>
          <th>NAMA</th>
          <th>TANGAL LAHIR</th>
          <th>TEMPAT LAHIR</th>
          <th>FOTO</th>
          <th>ACTION</th>
          </thead>";
    while ($row = mysqli_fetch_assoc($result)) {
        $nik = $row['nik'];

        echo "<tr>";
        echo "<td>".$row['nik']."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['tanggal_lahir']."</td>";
        echo "<td>".$row['tempat_lahir']."</td>";
        echo "<td><img src='http://localhost/code/praktikum7/images/".$row['foto']."' width=150 height=150 /></td>";
        echo "<td><a href='form_update.php?nik=$nik'><button>UPDATE</button></a>
              <a href='delete.php?nik=$nik'><button>DELETE</button></a></td>";
        echo "</tr>";
    }
    echo "</table><br>";
    echo "<a href='logout.php'><button>LOGOUT</button></a>";


?>