<?php include ('header.php'); ?>


<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
               Tambah Galeri
            </div>
            <div class="box-body1">

                <form action="" method="POST" enctype="multipart/form-data">
                    <table>

                        <tr>
                            <td>
                                <label>Keterangan</label>
                                <input class="tbl11" type="text" name="keterangan" placeholder="enter your username" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Foto </label>
                                <input type="file" name="gambar" class="slt11" required="required">
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

                        // gambar dapet dari name diatas
                        $filename = $_FILES['gambar']['name'];
                        $tmpname = $_FILES['gambar']['tmp_name'];
                        $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'galeri'.time().'.'.$formatfile;

                    
                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile, $allowedtype)){
                                        echo '<div class="alert">format tidak diizinkan </div>';

                        }elseif ($filesize > 1000000){
                        echo '<div class="alert">Ukuran file tidak boleh lebih dari 1mb </div>';

                        }else{
                        move_uploaded_file ($tmpname, "../galeri/".$rename);


                        
                        $simpan = mysqli_query ($conn, "INSERT INTO galeri VALUES(
                            null,
                            '".$rename."',
                            '".$ket."',
                            null,
                            null
                )");

         if($simpan){
            echo '<div class="alert-sukses">Tambah Data Berhasil </div>';
         }else{
             echo 'simpan gagal'.mysqli_error($conn);
         }
}
}

?>



            </div>

        </div>
    </div>
</div>

</body>

</html>




            </div>

        </div>
    </div>
</div>

</body>

</html>

<?php include ('footer.php'); ?>