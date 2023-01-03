<?php include ('header.php'); ?>
  


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
                    <p><?= substr ($j['keterangan'], 0,50 )?></p>
                    <a href="detail-jurusan.php?id=<?= $j ['id'] ?>" >Read More</a>
                </div>
            </div>

            <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>

    