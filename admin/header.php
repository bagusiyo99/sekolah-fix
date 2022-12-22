<?php
    session_start();
    include '../koneksi.php';
     if(!isset($_SESSION ['status_login'])){
        echo "<script> window.location = 'login.php?msg=harap login terlebih dahulu' </script>";
     }
    
// mengatur agar edit sesuai jam indonesia
        date_default_timezone_set("Asia/Jakarta");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <title>Document</title>
</head>

<body>


    <div class="navbar">
        <div class="container">
            <h2 class="nav-brand float-left  "> Nama Sekolah </h2>

            <ul class="nav-menu float-left ">
                <li><a href="index-admin.php"> Home </a></li>

                <?php if($_SESSION ['ulevel'] == 'Super Admin') { ?>

                <li><a href="pengguna-admin.php">Pengguna </a></li>

                <?php }elseif ($_SESSION ['ulevel']== 'Admin') { ?>


                <li><a href="jurusan.php">Jurusan </a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php"> Informasi</a></li>
                <li>
                    <a href="">Pengaturan <i class="las la-sort-down"></i></a>
                    <ul class="dropdown">
                        <li><a href=""> data Informasi</a></li>
                        <li><a href=""> Informasi</a></li>
                        <li><a href=""> Informasi</a></li>
                    </ul>
                </li>

                <?php } ?>
                <li>
                    <a href=""> <?= $_SESSION ['uname']?> (<?= $_SESSION ['ulevel']?>) <i class="las la-sort-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="ubah-password.php"> Ubah Password</a></li>
                        <li><a href="../logout.php"> Keluar</a></li>
                    </ul>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
