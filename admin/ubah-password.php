<?php include ('header.php'); ?>


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
                                <label>Password</label>
                                <input class="tbl11" type="password" name="pass1" placeholder="enter your Password"   required >
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Ulangi Password</label>
                                <input class="tbl11" type="password" name="pass2" placeholder="enter your Password" required>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="button"  value="Kembali"  class="btnsecondary11" onclick="window.location = 'pengguna-admin.php'"></input>
                                <input type="submit" name="submit" value="Ubah Password" class="btnsecondary1">
                            </td>
                        </tr>



                    </table>
                </form>


<?php

if(isset($_POST ['submit']))
{

        $pass1 = addslashes ( $_POST ['pass1']);
        $pass2 = addslashes ( $_POST ['pass2']);
        $currdate = date ('Y-m-d H:i:s');

        if($pass2 != $pass1){
            echo '<div class="alert">Ubah Password Tidak Sesuai </div>';

            }else{

        $update = mysqli_query ($conn, "UPDATE pengguna SET 

            password = '".MD5($pass1)."',
            updated_at = '".$currdate."'
            WHERE id = '".$_SESSION ['uid']."'

            ");

        if($update){
            echo '<div class="alert-sukses">Ubah Password Berhasil </div>';
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