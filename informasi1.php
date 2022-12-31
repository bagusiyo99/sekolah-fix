   <?php include ('header.php'); ?>
   
   <section id="blog">
        <?php
                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi ORDER BY id DESC");
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
    </section>
    <!-- class="section-p1"> (class untuk mengatur jarak) -->