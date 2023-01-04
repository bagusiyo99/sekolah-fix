<?php include ('header.php'); ?>
    
    <div class="banner">
        <div class="banner-text">
            <h3>Selamat Datang Di <?= $d ->nama ?></h3>
            <p> Sekolah menengah kejuruan yang berakreditasi a</p>
        </div>
    </div>


<!-- 
    <div class="section">
        <div class="container12 ">
            <h3>Sambutan Kepala Sekolah</h3>
            <img src="../identitas/<?=$d->foto_kepsek?>" width="100px">
            <h4><?= $d ->nama_kepsek ?></h4>
            <p> <?= $d ->sambutan_kepsek ?></p>
        </div>

    </div> -->

    <section id="fitur" class="section-p2 ">
        <div class="fe-box">
            <a href="jurusan.php">
            <img src="../img/features/f1.png" alt="">
            <h6> Kurikulum </h6>
            </a>
        </div>

        <div class="fe-box" >
            <img src="../img/features/f2.png" alt="">
            <h6> Prestasi </h6>
        </div>

        <div class="fe-box">
            <img src="../img/features/rice.png" alt="">
            <h6> Akreditasi </h6>
        </div>

        <div class="fe-box">
            <img src="../img/features/f4.png" alt="">
            <h6> Info Pembayaran</h6>
        </div>

        <div class="fe-box">
            <img src="../img/features/f5.png" alt="">
            <h6> Alumni </h6>
        </div>

        <div class="fe-box">
            <img src="../img/features/f6.png" alt="">
            <h6> Bantuan </h6>
        </div>
    </section>


        <!-- <div class ="garis">
        <h3 class="heading1">Tentang</h3>
        </div> -->
    <section class="info">
        <div class="main-info">
            <!-- <img src="../img/aset/sekolah.jpg"> -->
            <img src="../identitas/<?=$d->foto_kepsek?>" height="300px">

            <div class="tulis">
                <h4><?= $d ->nama_kepsek ?></h4>
                <h1>SMKN BAGUS BANDAR LAMPUNG</h1>
                <p><?= $d ->sambutan_kepsek ?>
                </p>
                <!-- <div class="btn-info">
                    
                    <button type="button">informasi Lebih Lanjut</button>
                </div> -->

            </div>
        </div>
      
    </section>


    <div class="main">
            <h3 class="heading">Jurusan</h3>

        <div class="atur">
                        <?php
                            $jurusan = mysqli_query ($conn, "SELECT * FROM jurusan ORDER BY id DESC  LIMIT 4");
                            if (mysqli_num_rows($jurusan)> 0){
                            while($j =mysqli_fetch_array($jurusan)){      
            ?>
            <div class="card-jurusan">
                
                <div class="card-image">
                    <a href="detail-jurusan.php?id=<?= $j ['id'] ?> ">
                    <img  class="thumbnail-img" src="../gambar-jurusan/<?php echo $j['gambar'] ?>">
                    </a>
                </div>
                <div class="card-description">
                    <h3><?= $j['nama']?></h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="detail-jurusan.php?id=<?= $j ['id'] ?>" >Read More</a>
                </div>
            </div>

            <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>


        <div class="main">
        <h3 class="heading">Tenaga Pengajar</h3>
        <div class="container3">
            <?php
                            $guru = mysqli_query ($conn, "SELECT * FROM guru ORDER BY id DESC LIMIT 5");
                            if (mysqli_num_rows($guru)> 0){
                            while($e =mysqli_fetch_array($guru)){      
            ?>    
            <div class="card">
                <img src="../guru/<?php echo $e['gambar'] ?>">
                <div class="details">
                    <h3><?= $e['nama']?></h3>
                    <p><?= substr ($e['mapel'], 0,50 )?></p>
                    <div class="social-links">
                        <a href="#">Detail</a>
                    </div>
                </div>
            </div>

                <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>


    

    <section id="blog">
        <div class="main">
         <h3 class="heading">Informasi Terbaru</h3>
        <?php
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 2");
                            if (mysqli_num_rows($informasi)> 0){
                            while($e =mysqli_fetch_array($informasi)){      
            ?>     

        <div class="blog-box">
             

            <div class="blog-img">
                <img src="../informasi/<?php echo $e['gambar'] ?>">
            </div>
            <div class="blog-detail">
                <h4><?= substr ($e['judul'], 0,50 )?></h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, assumenda, provident ipsam obcaecati nesciunt Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem provident velit iure optio tempora quos quas rem voluptate aperiam, quidem dolorum. Debitis, recusandae id eaque laudantium porro iste ad commodi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam debitis amet placeat distinctio rerum veniam? Eveniet quod reprehenderit laborum mollitia repellendus deleniti inventore veniam veritatis vero repellat. Magni, minus est. </p>
                <a href="detail-informasi.php?id=<?= $e ['id'] ?>">Lanjutkan Membaca</a>
            </div>


            
        </div>
        <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </section>





