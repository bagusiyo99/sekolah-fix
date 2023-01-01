<?php include ('header.php'); ?>
    
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


    <div class="main">
            <h3 class="heading">Jurusan</h3>
            <?php
                            $jurusan = mysqli_query ($conn, "SELECT * FROM jurusan ORDER BY id DESC LIMIT 3");
                            if (mysqli_num_rows($jurusan)> 0){
                            while($j =mysqli_fetch_array($jurusan)){      
            ?>
        <div class="atur">
            <div class="card-jurusan">
                <div class="card-image">
                    <a href="detail-jurusan.php?id=<?= $j ['id'] ?> ">
                    <img  class="thumbnail-img" src="gambar-jurusan/<?php echo $j['gambar'] ?>">
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

    
    <section id="produk1" class="section-p1">
        <h1> Kategori Produk </h1>
        <p> Berbagai Produk Terbaru </p>
        <div class="pro-produk">
                  <?php
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIt 4");
                            if (mysqli_num_rows($informasi)> 0){
                            while($e =mysqli_fetch_array($informasi)){      
            ?>
            <div class="pro">
                <a href="detail-informasi.php?id=<?= $e ['id'] ?> " class="thumbnail-link">

                <img  class="thumbnail-img" src="informasi/<?php echo $e['gambar'] ?>">
                <div class="deskripsi">
                     <?= substr ($e['judul'], 0,50 )?>
                   <!-- 50 karakter saja -->
                </div>
            </div>
                                        </a>

                <?php }}else{?>
                tidak ada
                <?php } ?>
            </div>
    </section>


    <section id="blog">
        <div class="main">
         <h3 class="heading"><span>Profile </span>Card</h3>
        <?php
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 2");
                            if (mysqli_num_rows($informasi)> 0){
                            while($e =mysqli_fetch_array($informasi)){      
            ?>     

        <div class="blog-box">
             

            <div class="blog-img">
                <img src="informasi/<?php echo $e['gambar'] ?>">
            </div>
            <div class="blog-detail">
                <h4><?= substr ($e['judul'], 0,50 )?></h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, assumenda, provident ipsam obcaecati nesciunt Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem provident velit iure optio tempora quos quas rem voluptate aperiam, quidem dolorum. Debitis, recusandae id eaque laudantium porro iste ad commodi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam debitis amet placeat distinctio rerum veniam? Eveniet quod reprehenderit laborum mollitia repellendus deleniti inventore veniam veritatis vero repellat. Magni, minus est. </p>
                <a href="#">Lanjutkan Membaca</a>
            </div>


            
        </div>
        <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </section>


    <div class="main">
        <h3 class="heading"><span>Profile </span>Card</h3>
        <div class="container3">
            <?php
                            $guru = mysqli_query ($conn, "SELECT * FROM guru ORDER BY id DESC LIMIT 4");
                            if (mysqli_num_rows($guru)> 0){
                            while($e =mysqli_fetch_array($guru)){      
            ?>    
            <div class="card">
                <img src="guru/<?php echo $e['gambar'] ?>">
                <div class="details">
                    <h3><?= $e['nama']?></h3>
                    <p><?= substr ($e['mapel'], 0,50 )?></p>
                    <div class="social-links">
                        <a href="#">INFO</a>
                    </div>
                </div>
            </div>

                <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>



    <?php include ('footer.php'); ?>