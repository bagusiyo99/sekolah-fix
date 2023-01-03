<?php include ('header.php'); ?>


<div class="section">
        <div class="detail-jurusan">

    
           <?php

                    $informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id= '" .$_GET ['id']."' ");

                                    if (mysqli_num_rows ($informasi) == 0){
                                    echo "<script> window.location='index.php' </script>";
                                    }
                    $p = mysqli_fetch_object ($informasi);
            ?>
            <!-- ngambil di edit jurusan -->

            <h3 > <?= $p->judul ?> </h3>
                <small> DIBUAT PADA <?= date ('d/m/Y', strtotime($p->created_at))  ?> </small>
                <br> <br>
                <img src="../informasi/<?php echo $p-> gambar ?>" width="500px" height="400px">
            <p>   <?= $p-> keterangan ?> </p>

        </div>
</div>

