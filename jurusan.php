<?php include ('header.php'); ?>
  
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
</div>

