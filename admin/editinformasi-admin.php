<?php include ('header.php'); ?>

<?php
// mengatur agar edit sesuai jam indonesia
        date_default_timezone_set("Asia/Jakarta");

        $informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id= '" .$_GET ['id']."' ");

                        if (mysqli_num_rows ($informasi) == 0){
                        echo "<script> window.location='informasi.php' </script>";
                        }
        $p = mysqli_fetch_object ($informasi);
?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                EDIT informasi
            </div>
            <div class="box-body1">


                <form action="" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <label>Judul</label>
                                <input class="tbl11" type="judul" name="judul" placeholder="enter your name"  value="<?= $p -> judul ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Keterangan</label>
                                <input class="tbl11" type="text" name="keterangan" placeholder="enter your username"  value="<?= $p -> keterangan ?>"  required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Foto </label>
                                <br>
                                <br>
                                <img src ="../informasi/<?=$p->gambar?>" width="300px" class="foto1">
                                
                                <input type="hidden" name="gambar2" value="<?= $p -> gambar ?>">
                                <input type="file" name="gambar" class="slt11" >
                                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit"  value="Kembali"  class="btnsecondary11" onclick="window.location = 'informasi.php'"></input>

                                <input type="submit" name="submit" value="Simpan" class="btnsecondary1">
                            </td>
                        </tr>



                    </table>
                </form>



<?php

if(isset($_POST ['submit']))
{

                        $judul = addslashes (ucwords( $_POST ['judul']));
                        $ket = addslashes ( $_POST ['keterangan']);
                        $currdate = date ('Y-m-d H:i:s');

        if($_FILES['gambar']['name'] != ''){

                // gambar dapet dari name diatas
                $filename = $_FILES['gambar']['name'];
                $tmpname = $_FILES['gambar']['tmp_name'];
                $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'informasi'.time().'.'.$formatfile;

                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');


                        if(file_exists("../informasi/".$_POST['gambar2'])){

                            unlink ("../informasi/".$_POST['gambar2']);
                        }

                        move_uploaded_file ($tmpname, "../informasi/".$rename);

                    }else{
                        echo 'user tidak ganti gambar';

                        $rename =$_POST ['gambar2'];
                    }

                                    $update = mysqli_query($conn, "UPDATE  informasi SET
                                    judul='".$judul."',
                                    keterangan ='".$ket."',
                                    gambar='".$rename."',
                                    updated_at='".$currdate."'
                                    WHERE id = '".$_GET ['id']."'
                                    ");

                                    if($update){
                                    echo "<script> window.location = 'informasi.php?sukses=Edit Data Berhasil' </script>";
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