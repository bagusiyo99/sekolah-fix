
<?php
    include 'koneksi.php';
// mengatur agar edit sesuai jam indonesia

 $identitas = mysqli_query ($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
 $d = mysqli_fetch_object ($identitas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="icon" href="identitas/<?= $d ->favicon ?>">
    <title>PANEL ADMIN <?= $d ->nama ?></title>
</head>
<body>
    
<div class="header">
        <img src="identitas/<?=$d->logo?>">
        <div>
            <ul class="header-logo ">
                <li><a href="index.php"> Home </a></li>
                <li><a href="tentang.php">Tentang Sekolah </a></li>
                <li><a href="jurusan.php">Jurusan </a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php"> Informasi</a></li>
                <li><a href="kontak.php"> Kontak</a></li>
            </ul>
        </div>
    </div>
