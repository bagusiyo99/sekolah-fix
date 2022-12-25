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


    
    <div class="section">
        <div class="container12">
            <h3>Jurusan</h3>
            <?php
                            $jurusan = mysqli_query ($conn, "SELECT * FROM jurusan ORDER BY id DESC");
                            if (mysqli_num_rows($jurusan)> 0){
                            while($j =mysqli_fetch_array($jurusan)){      
            ?>
            <div class="col-4">
                            <a href="detail-jurusan.php?id=<?= $j ['id'] ?> " class="thumbnail-link">
                <div class="thumbnail-box">
                    <div>
                        <img  class="thumbnail-img" src="gambar-jurusan/<?php echo $j['gambar'] ?>">
                    </div>

                    <div class="thumbnail-text">
                        <?= $j['nama']?>
                    </div>

                </div>
            </div>
                            </a>
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
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC");
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




<?php include ('footer.php'); ?>