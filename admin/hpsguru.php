<?php
      include '../koneksi.php';

// idpengguna berada di pengguna-admin.php
    if(isset($_GET ['idguru'])){
         $guru = mysqli_query ($conn, "SELECT gambar FROM guru WHERE id = '".$_GET['idguru']."' ");

        if(mysqli_num_rows($guru)> 0){
            $p= mysqli_fetch_object($guru);

            
                        if(file_exists("../guru/".$p->gambar)){

                            unlink ("../guru/".$p->gambar);
                        }
        }


        $delete = mysqli_query($conn, "DELETE FROM guru WHERE id= '" .$_GET ['idguru']."' ");
                    echo "<script> window.location = 'guru.php' </script>";
        
    }
?>