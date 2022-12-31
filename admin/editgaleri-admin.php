<?php include ('header.php'); ?>

<?php
// mengatur agar edit sesuai jam indonesia
        date_default_timezone_set("Asia/Jakarta");

        $galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id= '" .$_GET ['id']."' ");

                        if (mysqli_num_rows ($galeri) == 0){
                        echo "<script> window.location='galeri.php' </script>";
                        }
        $p = mysqli_fetch_object ($galeri);
?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                EDIT GALERI
            </div>
            <div class="box-body1">

            <form action="" method="POST" enctype="multipart/form-data">
                    <table>

                        <tr>
                            <td>
                                <label>Keterangan</label>
                                <input class="tbl11" type="text" name="keterangan" placeholder="keterangan gambar" value="<?= $p -> keterangan ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Foto </label>
                                <br>
                                <br>
                                <img src ="../galeri/<?=$p->foto?>" width="300px" class="foto1">
                                
                                <input type="hidden" name="gambar2" value="<?= $p -> foto ?>">
                                <input type="file" name="gambar" class="slt11" >
                                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit"  value="Kembali"  class="btnkembali" onclick="window.location = 'galeri.php'"></input>
                                <input type="submit" name="submit" value="Simpan" class="btnsimpan">
                            </td>
                        </tr>



                    </table>
            </form>


<?php

if(isset($_POST ['submit']))
{

                        $ket = addslashes (ucwords( $_POST ['keterangan']));
                        $currdate = date ('Y-m-d H:i:s');

        if($_FILES['gambar']['name'] != ''){

                // gambar dapet dari name diatas
                $filename = $_FILES['gambar']['name'];
                $tmpname = $_FILES['gambar']['tmp_name'];
                $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'galeri'.time().'.'.$formatfile;

                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');


                        if(file_exists("../galeri/".$_POST['gambar2'])){

                            unlink ("../galeri/".$_POST['gambar2']);
                        }

                        move_uploaded_file ($tmpname, "../galeri/".$rename);

                    }else{
                        echo 'user tidak ganti gambar';

                        $rename =$_POST ['gambar2'];
                    }

                                    $update = mysqli_query($conn, "UPDATE  galeri SET
                                    
                                    keterangan ='".$ket."',
                                    foto='".$rename."',
                                    updated_at='".$currdate."'
                                    WHERE id = '".$_GET ['id']."'
                                    ");

                                    if($update){
                                    echo "<script> window.location = 'galeri.php?sukses=Edit Data Berhasil' </script>";
                                    }else{
                                        echo 'simpan gagal'.mysqli_error($conn);
                                    }

}

?>



            </div>

        </div>
    </div>
</div>

</body>

</html>

<?php include ('footer.php'); ?>