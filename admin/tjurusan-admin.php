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
                                <label>Keterangan</label>
                                <input class="tbl11" type="text" name="keterangan" placeholder="keterangan jurusan" required>
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
                                <input type="submit"  value="Kembali"  class="btnkembali" onclick="window.location = 'jurusan.php'"></input>

                                <input type="submit" name="submit" value="Simpan" class="btnsimpan">
                            </td>
                        </tr>



                    </table>
                </form>
      <?php

if(isset($_POST ['submit']))
{

                        $nama = addslashes (ucwords( $_POST ['nama']));
                        $ket = addslashes ( $_POST ['keterangan']);

                        // gambar dapet dari name diatas
                        $filename = $_FILES['gambar']['name'];
                        $tmpname = $_FILES['gambar']['tmp_name'];
                        $filesize = $_FILES['gambar']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'jurusan'.time().'.'.$formatfile;

                    
                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile, $allowedtype)){
                                        echo '<div class="alert">format tidak diizinkan </div>';

                        }elseif ($filesize > 1000000){
                        echo '<div class="alert">Ukuran file tidak boleh lebih dari 1mb </div>';

                        }else{
                        move_uploaded_file ($tmpname, "../gambar-jurusan/".$rename);


                        
                        $simpan = mysqli_query ($conn, "INSERT INTO jurusan VALUES(
                            null,
                            '".$nama."',
                            '".$ket."',
                            '".$rename."',
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




                <!-- if(isset($_POST ['submit']))

                // print_r($_FILES['foto']);
                $nama = addslashes (ucwords( $_POST ['nama']));
                $ket = addslashes ( $_POST ['keterangan']);

                
                        $filename = $_FILES['foto']['name'];
                        $tmpname = $_FILES['foto']['tmp_name'];
                        $filesize = $_FILES['foto']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'jurusan'.time().'.'.$formatfile;

                        $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');

                        if(!in_array($formatfile, $allowedtype)){
                                        echo '<div class="alert">format tidak diizinkan </div>';

                        }else{

                        move_uploaded_file ($filename, "gambar/".$rename);

                        $simpan = mysqli_query ($conn, "INSERT INTO jurusan VALUES(
                            null,
                            '".$nama."',
                            '".$ket."',
                            '".$rename."',
                            null,
                            null
                )");
        if($simpan){
            echo '<div class="alert-sukses">Tambah Data Berhasil </div>';
        }else{
            echo 'simpan gagal'.mysqli_error($conn);
        }
} -->


















<!-- 


<div class="container">
		<h2 style="text-align: center;">Tambah Data Pegawai</h2>
		<form action="user_act.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama :</label>
				<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required="required">
			</div>
			<div class="form-group">
				<label>keterangan :</label>
				<input type="text" class="form-control" placeholder="Masukkan Kontak" name="keterangan" required="required">
			</div>
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>			
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div> -->



<!-- // if(isset($_POST ['submit']))
// {

//             $nama = addslashes (ucwords( $_POST ['nama']));
//             $ket = addslashes ( $_POST ['keterangan']);

//         $filename = $_FILES['gambar']['name'];
//         $tmpname = $_FILES['gambar']['tmp_name'];
//         $filesize = $_FILES['gambar']['size'];

//         $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
//         $rename = 'jurusan'.time().'.'.$formatfile;

//         $allowedtype= array ('png', 'jpg', 'jpeg', 'gift');

//         if(!in_array($formatfile, $allowedtype)){
//                         echo '<div class="alert">format tidak diizinkan </div>';

//         }else{

//         move_uploaded_file ($filename, "gambar-jurusan".$rename);

//         $simpan = mysqli_query ($conn, "INSERT INTO jurusan VALUES(
//             null,
//             '".$nama."',
//             '".$ket."',
//             '".$rename."',
//             null,
//             null

//         )");
//         if($simpan){
//             echo '<div class="alert-sukses">Tambah Data Berhasil </div>';
//         }else{
//             echo 'simpan gagal'.mysqli_error($conn);
//         }

//         }
        
// } -->





            </div>

        </div>
    </div>
</div>

</body>

</html>

<?php include ('footer.php'); ?>