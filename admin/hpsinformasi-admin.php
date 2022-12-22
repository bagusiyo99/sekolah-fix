<?php
    include '../koneksi.php';

// idpengguna berada di pengguna-admin.php
    if(isset($_GET ['idinformasi'])){
         $informasi = mysqli_query ($conn, "SELECT gambar FROM informasi WHERE id = '".$_GET['idinformasi']."' ");

        if(mysqli_num_rows($informasi)> 0){
            $p= mysqli_fetch_object($informasi);

            
                        if(file_exists("../informasi/".$p->gambar)){

                            unlink ("../informasi/".$p->gambar);
                        }
        }


        $delete = mysqli_query($conn, "DELETE FROM informasi WHERE id= '" .$_GET ['idinformasi']."' ");
                    echo "<script> window.location = 'informasi.php' </script>";
        
    }
?>