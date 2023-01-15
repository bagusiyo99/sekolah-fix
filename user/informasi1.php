    <?php include ('header.php'); ?>

    <section id="page-header" class="blog-header">


        <h2>Informasi Terkini</h2>
        <p> Informasi Selalu Update</p>


    </section>



    <section id="blog">
        <div class="main">
            <h3 class="heading">Informasi</h3>
        <?php
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC ");
                            if (mysqli_num_rows($informasi)> 0){
                            while($e =mysqli_fetch_array($informasi)){      
            ?>     

            <div class="blog-box">
                    <div class="blog-img" data-aos="zoom-in-right"  data-aos-duration="3500" >
                        <img src="../informasi/<?php echo $e['gambar'] ?>">
                    </div>
                    <div class="blog-detail"  data-aos="zoom-in-left"  data-aos-duration="3500">
                        <h4><?= $e['judul']?></h4>
                        <p><?= substr ($e['keterangan'], 0,200 )?>..........</p>
                        <a href="detail-informasi.php?id=<?= $e ['id'] ?>">Lanjutkan Membaca</a>
                    </div>  
            </div>
        <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </section>

    <!-- class="section-p1"> (class untuk mengatur jarak) -->

<?php include ('footer1.php'); ?>
