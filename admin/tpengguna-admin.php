<?php include ('header.php'); ?>

<div class="contenti">

    <div class="containeri">

        <div class="box">

            <div class="box-header1">
                Edit Pengguna
            </div>
            <div class="box-body1">

                <form text-center action="" method="POST">
                    <table>
                        <tr>
                            <td>
                                <label>Nama Lengkap</label>
                                <input class="tbl11" type="text" name="nama" placeholder="Nama Lengkap" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Username</label>
                                <input class="tbl11" type="text" name="username" placeholder="Username" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Level</label>
                                <br>
                                <select name="level" class="slt11" required>
                                    <option value="">Pilih</option>
                                    <option value="Super Admin"> Super Admin</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit"  value="Kembali"  class="btnkembali" onclick="window.location = 'pengguna-admin.php'"></input>

                                <input type="submit" name="submit" value="Simpan" class="btnsimpan">
                            </td>
                        </tr>



                    </table>
                </form>


<?php

if(isset($_POST ['submit']))
{

        $nama = addslashes (ucwords( $_POST ['nama']));
        $username = $_POST ['username'];
        $level = $_POST ['level'];
        $password = '12345';

        $simpan = mysqli_query ($conn, "INSERT INTO pengguna VALUES(
            null,
            '".$nama."',
            '".$username."',
            '".MD5($password)."',
            '".$level."',
            null,
            null

        )");
        if($simpan){
            echo '<div class="alert-sukses">Tambah Data Berhasil </div>';
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