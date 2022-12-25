<?php include ('header.php'); ?>
<div class="section">
        <div class="container12">

    
            <?php

                    $jurusan = mysqli_query($conn, "SELECT * FROM jurusan WHERE id= '" .$_GET ['id']."' ");

                                    if (mysqli_num_rows ($jurusan) == 0){
                                    echo "<script> window.location='index.php' </script>";
                                    }
                    $p = mysqli_fetch_object ($jurusan);
            ?>
            <!-- ngambil di edit jurusan -->

            <h3 class="text-center"> <?= $p->nama ?> </h3>
                <img src="gambar-jurusan/<?php echo $p-> gambar ?>" width="500px" height="400px">
            <h1 class="text-center">   <?= $p-> keterangan ?> </h1>

        </div>
</div>


<?php include ('footer.php'); ?>