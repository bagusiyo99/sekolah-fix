
<?php
    include '../koneksi.php';
// mengatur agar edit sesuai jam indonesia

 $identitas = mysqli_query ($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
 $d = mysqli_fetch_object ($identitas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="icon" href="identitas/<?= $d ->favicon ?>">
    <title>PANEL ADMIN <?= $d ->nama ?></title>
</head>
<body>
    
 <nav class="navbar1">
        <a href="" class="logo">SMKN BAGUS</a>
        <input type="checkbox" id="toggler">
        <label for="toggler"> <i class="las la-bars"></i></label>
        <div class="menu">
            <ul class="list ">
                <li><a href="index.php"> Home </a></li>
                <li><a href="tentang.php">Tentang  </a></li>
                <li><a href="jurusan.php">Jurusan </a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi1.php"> Informasi</a></li>
                <li><a href="kontak.php"> Kontak</a></li>
            </ul>
        </div>

    </nav>

