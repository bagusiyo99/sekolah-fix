<?php
    include '../koneksi.php';

// idpengguna berada di pengguna-admin.php
    if(isset($_GET ['idpengguna'])){
        
        $delete = mysqli_query($conn, "DELETE FROM pengguna WHERE id= '" .$_GET ['idpengguna']."' ");
                    echo "<script> window.location = 'pengguna-admin.php' </script>";
        
    }
?>