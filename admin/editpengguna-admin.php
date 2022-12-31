<?php include ('header.php'); ?>

<?php
// mengatur agar edit sesuai jam indonesia
        date_default_timezone_set("Asia/Jakarta");

        $pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id= '" .$_GET ['id']."' ");

                        if (mysqli_num_rows ($pengguna) == 0){
                        echo "<script> window.location='pengguna-admin.php' </script>";
                        }
        $p = mysqli_fetch_object ($pengguna);
?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                Dasboard
            </div>
            <div class="box-body1">

                <form text-center action="" method="POST">
                    <table>
                        <tr>
                            <td>
                                <label>Nama Lengkap</label>
                                <input class="tbl11" type="text" name="nama" placeholder="Nama Lengkap" value="<?= $p -> nama ?>"  required >
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Username</label>
                                <input class="tbl11" type="text" name="username" placeholder="Username"value="<?= $p -> username ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Level</label>
                                <br>
                                <select name="level" class="slt11" required>
                                    <option value="">Pilih</option>
                                    <option value="Super Admin" <?=($p->level == 'Super Admin')? 'selected':''; ?> > Super Admin</option>
                                    <option value="Admin" <?=($p->level == 'Admin')? 'selected':''; ?> >Admin</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="button"  value="Kembali"  class="btnkembali" onclick="window.location = 'pengguna-admin.php'"></input>
                                <input type="submit" name="submit" value="Simpan" class="btnsimpan">
                            </td>
                        </tr>



                    </table>
                </form>


<?php

if(isset($_POST ['submit']))
{

        $nama = addslashes (ucwords( $_POST ['nama']));
        $username = addslashes ( $_POST ['username']);
        $level = $_POST ['level'];
        $currdate = date ('Y-m-d H:i:s');

        $update = mysqli_query ($conn, "UPDATE pengguna SET 

           nama = '".$nama."',
           username = '".$username."',
            level='".$level."',
            updated_at = '".$currdate."'
            WHERE id = '".$_GET ['id']."'

            ");

        if($update){
            echo '<div class="alert-sukses">Edit Data Berhasil </div>';
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