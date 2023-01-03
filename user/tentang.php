<?php include ('header.php'); ?>
<div class="section">
        <div class="container12">

            <h3 class="text-center"> Tentang Sekolah</h3>
                <img src="../identitas/<?php echo $d-> foto_sekolah ?>" width="500px" height="400px">
            <h1 class="text-center">   <?= $d-> tentang_sekolah ?> </h1>

        </div>
</div>

    <div class="main">
        <h3 class="heading">Tenaga Pengajar</h3>
        <div class="container3">
            <?php
                            $guru = mysqli_query ($conn, "SELECT * FROM guru ORDER BY id DESC ");
                            if (mysqli_num_rows($guru)> 0){
                            while($e =mysqli_fetch_array($guru)){      
            ?>    
            <div class="card">
                <img src="../guru/<?php echo $e['gambar'] ?>">
                <div class="details">
                    <h3><?= $e['nama']?></h3>
                    <p><?= substr ($e['mapel'], 0,50 )?></p>
                    <div class="social-links">
                        <a href="#">Detail</a>
                    </div>
                </div>
            </div>

                <?php }}else{?>
                tidak ada
                <?php } ?>
        </div>
    </div>

