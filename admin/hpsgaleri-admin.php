<?php
    include '../koneksi.php';

// idpengguna berada di pengguna-admin.php
    if(isset($_GET ['idgaleri'])){
         $galeri = mysqli_query ($conn, "SELECT foto FROM galeri WHERE id = '".$_GET['idgaleri']."' ");

        if(mysqli_num_rows($galeri)> 0){
            $p= mysqli_fetch_object($galeri);

            
                        if(file_exists("../galeri/".$p->foto)){

                            unlink ("../galeri/".$p->foto);
                        }
        }


        $delete = mysqli_query($conn, "DELETE FROM galeri WHERE id= '" .$_GET ['idgaleri']."' ");
                    echo "<script> window.location = 'galeri.php' </script>";
        
    }
?>