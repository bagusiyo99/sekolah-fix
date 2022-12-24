<?php include ('header.php'); ?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                identitas sekolah
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
                                <label>Nama Lengkap</label>
                                <input class="tbl11" type="text" name="nama" placeholder="enter your name" value="<?= $d -> nama ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                                <input class="tbl11" type="email" name="email" placeholder="enter your email" value="<?= $d -> email ?>"  required>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <label>Telepon</label>
                                <input class="tbl11" type="text" name="telp" placeholder="enter your email" value="<?= $d -> telepon ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>ALamat</label>
                                <input class="tbl11" type="text" name="alamat" placeholder="enter your aLamat" value="<?= $d -> alamat ?>"  required>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <label>Google Maps</label>
                                <input class="tbl11" type="text" name="gmaps" placeholder="enter your email" value="<?= $d -> google_maps ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>logo </label>
                                <br>
                                <br>
                                <img src ="../identitas/<?=$d->logo?>" width="300px" class="foto1">
                                
                                <input type="hidden" name="logo_lama" value="<?=$d->logo?>">
                                <input type="file" name="logo_baru" class="slt11" >
                                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>favicon </label>
                                <br>
                                <br>
                                <img src ="../identitas/<?=$d->favicon ?>" width="300px" class="foto1">
                                
                                <input type="hidden" name="favicon_lama" value="<?=$d->favicon ?>">
                                <input type="file" name="favicon_baru" class="slt11" >
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
                        $email = addslashes ( $_POST ['email']);
                        $telp = addslashes ( $_POST ['telp']);
                        $alamat = addslashes ( $_POST ['alamat']);
                        $gmaps = addslashes ( $_POST ['gmaps']);
                        $currdate = date ('Y-m-d H:i:s');

        if($_FILES['logo_baru']['name'] != ''){

                // gambar dapet dari name diatas
                $filename_logo = $_FILES['logo_baru']['name'];
                $tmpname_logo = $_FILES['logo_baru']['tmp_name'];
                $filesize_logo = $_FILES['logo_baru']['size'];

                        $formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
                        $rename_logo = 'logo'.time().'.'.$formatfile_logo;

                        $allowedtype_logo = array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile_logo, $allowedtype_logo)){
                        echo '<div class ="alert">format file tidak diizinkan.</div>';
                        return false;
                    }elseif($filesize_logo > 1000000){
                        echo '<div class ="alert">ukuran file tidak boleh lebih dari 1 MB.</div>';
                        return false;
                    }else{
                        if(file_exists("../identitas/".$_POST['logo_lama'])){
                            unlink ("../identitas/".$_POST['logo_lama']);
                        }

                        move_uploaded_file ($tmpname_logo, "../identitas/".$rename_logo);
                    }
                    

                    }else{
                        echo 'user tidak ganti gambar';

                        $rename_logo =$_POST ['logo_lama'];
                    }

                    // menampung data favicon
        if($_FILES['favicon_baru']['name'] != ''){

                // gambar dapet dari name diatas
                $filename_favicon = $_FILES['favicon_baru']['name'];
                $tmpname_favicon = $_FILES['favicon_baru']['tmp_name'];
                $filesize_favicon = $_FILES['favicon_baru']['size'];

                        $formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
                        $rename_favicon = 'favicon'.time().'.'.$formatfile_favicon;

                        $allowedtype_favicon = array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile_favicon, $allowedtype_favicon)){
                        echo '<div class ="alert">format file tidak diizinkan.</div>';
                        return false;
                    }elseif($filesize_favicon > 1000000){
                        echo '<div class ="alert">ukuran file tidak boleh lebih dari 1 MB.</div>';
                        return false;
                    }else{
                        if(file_exists("../identitas/".$_POST['favicon_lama'])){
                            unlink ("../identitas/".$_POST['favicon_lama']);
                        }

                        move_uploaded_file ($tmpname_favicon, "../identitas/".$rename_favicon);
                    }

                    }else{
                        echo 'user tidak ganti gambar';

                        $rename_favicon =$_POST ['favicon_lama'];
                    }

                                    $update = mysqli_query($conn, "UPDATE  pengaturan SET
                                    nama='".$nama."',
                                    email ='".$email."',
                                    telepon='".$telp."',
                                    alamat='".$alamat."',
                                    google_maps ='".$gmaps."',
                                    logo='".$rename_logo."',
                                    favicon='".$rename_favicon."',
                                    updated_at='".$currdate."'
                                    WHERE id = '".$d->id ."'
                                    ");

                                    if($update){
                                    echo "<script> window.location = 'identitas-admin.php?sukses=Edit Data Berhasil' </script>";
                                    
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