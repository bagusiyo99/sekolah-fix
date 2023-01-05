    <?php include ('header.php'); ?>

    <section id="page-header" class="blog-header">


        <h2>Informasi Terkini</h2>
        <p> Informasi Selalu Update</p>


    </section>



    <section id="blog1">
        <?php
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC");
                            if (mysqli_num_rows($informasi)> 0){
                            while($e =mysqli_fetch_array($informasi)){      
            ?>     

        <div class="blog-box">

            <div class="blog-img">
                <img src="../informasi/<?php echo $e['gambar'] ?>">
            </div>
            <div class="blog-detail1">
                <h4><?= substr ($e['judul'], 0,50 )?></h4>
                <p>Dapatkan Informasi Terbaru dan Ikuti Petunjuk Sesuai Dengan Ketentuan Informasi Yang sudah DiInfokan </p>
                <a href="detail-informasi.php?id=<?= $e ['id'] ?> ">Lanjutkan Membaca</a>
            </div>


            
        </div>
        <?php }}else{?>
                tidak ada
                <?php } ?>
    </section>
    <!-- class="section-p1"> (class untuk mengatur jarak) -->

