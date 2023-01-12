<?php include ('header.php'); ?>
  
    <!-- <div class="section">
        <div class="container12">
            <h3>galeri</h3>
            <?php
                              $galeri = mysqli_query ($conn, "SELECT * FROM galeri  ORDER BY id DESC");
                            if (mysqli_num_rows($galeri)> 0){
                                while($p =mysqli_fetch_array($galeri)){
            ?>
            <div class="col-4">
                            <a href="../galeri/<?= $p ['foto'] ?> " class="thumbnail-link">
                <div class="thumbnail-box">
                    <div>
                        <img  class="thumbnail-img" src="../galeri/<?php echo $p['foto'] ?>">
                    </div>

                    <div class="thumbnail-text">
                        <?= $p['keterangan']?>
                    </div>

                </div>
            </div>
                            </a>
            <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>

    </div>
</div> -->

    <section id="page-header" class="blog-header">


        <h2>Selamat Datang </h2>
        <p> Kumpulan Galeri Kenangan-Kenangan </p>


     </section>




    <div class="main">
            <h3 class="heading">Jurusan</h3>

        <div class="galeri">
                                <?php
                                        $galeri = mysqli_query ($conn, "SELECT * FROM galeri  ORDER BY id DESC");
                                        if (mysqli_num_rows($galeri)> 0){
                                            while($p =mysqli_fetch_array($galeri)){
                                ?>
            <div class="kenangan">
                
                <div class="card-galeri">
                    <a href="../galeri/<?= $p ['foto'] ?> ">
                        <img src="../galeri/<?php echo $p['foto'] ?>">
                    </a>
                </div>
                <div class="galeri-description">
                    <p><?= substr ($p ['keterangan'], 0,50 )?></p>
                </div>
            </div>

            <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>
