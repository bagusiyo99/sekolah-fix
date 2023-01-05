<?php include ('header.php'); ?>

<?php
// mengatur agar edit sesuai jam indonesia
        date_default_timezone_set("Asia/Jakarta");

        $guru = mysqli_query($conn, "SELECT * FROM guru WHERE id= '" .$_GET ['id']."' ");

                        if (mysqli_num_rows ($guru) == 0){
                        echo "<script> window.location='guru.php' </script>";
                        }
        $p = mysqli_fetch_object ($guru);
?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                EDIT GURU
            </div>
            <div class="box-body1">

            <form action="" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <label>Nama Lengkap</label>
                                <input class="tbl11" type="text" name="nama" placeholder="Nama Lengkap" value="<?= $p -> nama ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Mata pelajaran</label>
                                <input class="tbl11" type="text" name="mapel" placeholder="Mata pelajaran" value="<?= $p -> mapel ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Foto </label>
                                <br>
                                <br>
                                <img src ="../guru/<?=$p->gambar?>" width="300px" class="foto1">
                                
                                <input type="hidden" name="gambar2" value="<?= $p -> gambar ?>">
                                <input type="file" name="gambar" class="input-foto" >
                                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit"  value="Kembali"  class="btnkembali" onclick="window.location = 'guru.php'"></input>

                                <input type="submit" name="submit" value="Simpan" class="btnsimpan">
                            </td>
                        </tr>

                    </table>
            </form>


<?php

if(isset($_POST ['submit']))
{

                        $nama = addslashes (ucwords( $_POST ['nama']));
                        $map = addslashes ( $_POST ['mapel']);


        if($_FILES['gambar']['name'] != ''){

                // gambar dapet dari name diatas
                $filename = $_FILES['gambar']['name'];
                $tmpname = $_FILES['gambar']['tmp_name'];
                $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'guru'.time().'.'.$formatfile;

                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');

                        if(file_exists("../guru/".$_POST['gambar2'])){

                            unlink ("../guru/".$_POST['gambar2']);
                        }
                    
                        move_uploaded_file ($tmpname, "../guru/".$rename);
                    
                    }else{
                        echo 'user tidak ganti gambar';

                        $rename =$_POST ['gambar2'];
                    }
                                    $update = mysqli_query($conn, "UPDATE  guru SET
                                    nama='".$nama."',
                                    mapel ='".$map."',
                                    gambar='".$rename."'
                                    WHERE id = '".$_GET ['id']."'
                                    ");

                                    if($update){
                                    echo "<script> window.location = 'guru.php?sukses=Edit Data Berhasil' </script>";
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