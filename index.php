
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
                <li><a href="index-admin.php"> Home </a></li>
                <li><a href="pengguna-admin.php">Tentang Sekolah </a></li>
                <li><a href="jurusan.php">Jurusan </a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php"> Informasi</a></li>
                <li><a href="informasi.php"> Kontak</a></li>
            </ul>
        </div>
    </div>

    
    <div class="banner">
        <div class="banner-text">
            <h3>Selamat Datang Di <?= $d ->nama ?></h3>
            <p> Sekolah menengah kejuruan yang berakreditasi a</p>
        </div>
    </div>



    <div class="section">
        <div class="container12 ">
            <h3>Sambutan Kepala Sekolah</h3>
            <img src="identitas/<?=$d->foto_kepsek?>" width="100px">
            <h4><?= $d ->nama_kepsek ?></h4>
            <p> <?= $d ->sambutan_kepsek ?></p>
        </div>

    </div>


    
    <div class="section">
        <div class="container12">
            <h3>Jurusan</h3>
            <?php
                            $jurusan = mysqli_query ($conn, "SELECT * FROM jurusan ORDER BY id DESC");
                            if (mysqli_num_rows($jurusan)> 0){
                            while($d =mysqli_fetch_array($jurusan)){      
            ?>
            <div class="col-4">
                <div class="thumbnail-box">
                    <div>
                        <img  class="thumbnail-img" src="gambar-jurusan/<?php echo $d['gambar'] ?>">
                    </div>

                    <div class="thumbnail-text">
                        <?= $d['nama']?>
                    </div>



                </div>
            </div>
            <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>

    </div>















</body>
</html>