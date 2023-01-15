<?php include ('header.php'); ?>
  
    <section id="page-header" class="blog-header">


        <h2>Selamat Datang</h2>
        <p> Berbagai Jurusan Yang Ada di SMKN Bagus Bandar Lampung</p>


    </section>

    <div class="main">
            <h3 class="heading">Jurusan</h3>

        <div class="atur">
                        <?php
                            $jurusan = mysqli_query ($conn, "SELECT * FROM jurusan ORDER BY id DESC ");
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
                    <p><?= substr ($j['keterangan'], 0,80 )?>.....</p>
                    <a href="detail-jurusan.php?id=<?= $j ['id'] ?>" >Info Detail</a>
                </div>
            </div>

            <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>

    