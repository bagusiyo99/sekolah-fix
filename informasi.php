<?php include ('header.php'); ?>
  
 
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

