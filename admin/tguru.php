<?php include ('header.php'); ?>


<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                Edit Pengguna
            </div>
            <div class="box-body1">

                <form action="" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <label>Nama Lengkap</label>
                                <input class="tbl11" type="text" name="nama" placeholder="Nama Lengkap" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Mata Pelajaran</label>
                                <input class="tbl11" type="text" name="mapel" placeholder="Mata Pelajaran" required>
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

                        // gambar dapet dari name diatas
                        $filename = $_FILES['gambar']['name'];
                        $tmpname = $_FILES['gambar']['tmp_name'];
                        $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'guru'.time().'.'.$formatfile;

                    
                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile, $allowedtype)){
                        echo '<div class="alert">format tidak diizinkan </div>';

                        // jika mau foto tidak lebih dari 1 mb maka aktifkan

                        // }elseif ($filesize > 1000000){
                        // echo '<div class="alert">Ukuran file tidak boleh lebih dari 1mb </div>';

                        }else{
                        move_uploaded_file ($tmpname, "../guru/".$rename);


                        
                        $simpan = mysqli_query ($conn, "INSERT INTO guru VALUES(
                            null,
                            '".$nama."',
                            '".$map."',
                            '".$rename."'
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


<?php include ('footer.php'); ?>