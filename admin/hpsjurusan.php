<?php
      include '../koneksi.php';

// idpengguna berada di pengguna-admin.php
    if(isset($_GET ['idjurusan'])){
         $jurusan = mysqli_query ($conn, "SELECT gambar FROM jurusan WHERE id = '".$_GET['idjurusan']."' ");

        if(mysqli_num_rows($jurusan)> 0){
            $p= mysqli_fetch_object($jurusan);

            
                        if(file_exists("../gambar/".$p->gambar)){

                            unlink ("../gambar/".$p->gambar);
                        }
        }


        $delete = mysqli_query($conn, "DELETE FROM jurusan WHERE id= '" .$_GET ['idjurusan']."' ");
                    echo "<script> window.location = 'jurusan.php' </script>";
        
    }
?>