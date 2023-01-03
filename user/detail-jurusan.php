<?php include ('header.php'); ?>
<div class="section">
        <div class="detail-jurusan">

    
            <?php

                    $jurusan = mysqli_query($conn, "SELECT * FROM jurusan WHERE id= '" .$_GET ['id']."' ");

                                    if (mysqli_num_rows ($jurusan) == 0){
                                    echo "<script> window.location='index.php' </script>";
                                    }
                    $p = mysqli_fetch_object ($jurusan);
            ?>
            <!-- ngambil di edit jurusan -->

            <h3 > <?= $p->nama ?> </h3>
                <img src="../gambar-jurusan/<?php echo $p-> gambar ?>" width="500px" height="400px">
            <p>   <?= $p-> keterangan ?> </p>

        </div>
</div>

