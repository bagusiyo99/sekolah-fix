<?php include ('header.php'); ?>
<div class="section">
        <div class="container12">

    
            <?php

                    $informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id= '" .$_GET ['id']."' ");

                                    if (mysqli_num_rows ($informasi) == 0){
                                    echo "<script> window.location='index.php' </script>";
                                    }
                    $p = mysqli_fetch_object ($informasi);
            ?>
            <!-- ngambil di edit jurusan -->

            <h3 class="text-center"> <?= $p->judul ?> </h3>
                <img src="informasi/<?php echo $p-> gambar ?>" width="500px" height="400px">
            <h1 class="text-center">   <?= $p-> keterangan ?> </h1>

        </div>
</div>


<?php include ('footer.php'); ?>