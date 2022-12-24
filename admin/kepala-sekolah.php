<?php include ('header.php'); ?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                Tentang sekolah
            </div>
            <div class="box-body1">
            <?php
                if(isset($_GET['sukses'])){
                                echo '<div class="alert-sukses">Tambah Data Berhasil </div>';
                }
                ?>
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <label>Nama </label>
                                <input class="tbl11" type="text" name="nama" placeholder="enter your aLamat" value="<?= $d ->nama_kepsek ?>" required>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Sambutan</label>
                                <br>
                                <textarea class="tbl11"  type="text" name="sambutan" placeholder="enter your aLamat" value="<?= $d ->sambutan_kepsek ?>" required>  </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Foto Sekolah </label>
                                <br>
                                <br>
                                <img src="../identitas/<?=$d->foto_kepsek ?>" width="300px" class="foto1">

                                <input type="hidden" name="foto_lama" value="<?=$d->foto_kepsek ?>">
                                <input type="file" name="foto_baru" class="slt11">
                                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Simpan" class="btnsecondary1">
                            </td>
                        </tr>



                    </table>
                </form>



<?php

if(isset($_POST ['submit']))
{

                        $nama = addslashes (ucwords( $_POST ['nama']));
                        $sambutan = addslashes (ucwords( $_POST ['sambutan']));
                        $currdate = date ('Y-m-d H:i:s');

        if($_FILES['foto_baru']['name'] != ''){

                // gambar dapet dari name diatas
                $filename = $_FILES['foto_baru']['name'];
                $tmpname = $_FILES['foto_baru']['tmp_name'];
                $filesize = $_FILES['foto_baru']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'kepsek'.time().'.'.$formatfile;

                        $allowedtype = array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile, $allowedtype)){
                        echo '<div class ="alert">format file tidak diizinkan.</div>';
                        return false;
                    }elseif($filesize > 1000000){
                        echo '<div class ="alert">ukuran file tidak boleh lebih dari 1 MB.</div>';
                        return false;
                    }else{
                        if(file_exists("../identitas/".$_POST['foto_lama'])){
                            unlink ("../identitas/".$_POST['foto_lama']);
                        }

                        move_uploaded_file ($tmpname, "../identitas/".$rename);
                    }
                    

                    }else{
                        echo 'user tidak ganti gambar';

                        $rename =$_POST ['foto_lama'];
                    }

                                    $update = mysqli_query($conn, "UPDATE  pengaturan SET
                                    nama_kepsek ='".$nama."',
                                    sambutan_kepsek ='".$sambutan."',
                                    foto_kepsek ='".$rename."',
                                    updated_at='".$currdate."'
                                    WHERE id = '".$d->id ."'
                                    ");

                                    if($update){
                                    echo "<script> window.location = 'kepala-sekolah.php?sukses=Edit Data Berhasil' </script>";
                                    
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