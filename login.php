<?php
    session_start();
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/style.css">

    <title>Document</title>
</head>

<body>


        <div class="login">
            <h2 class="login-header"> Login</h2>
            
            <?php
                if(isset($_GET['msg'])){
                    echo "<div class='alert alert-error'>". $_GET['msg']. "</div>";
                }
                ?>
            <form class="login-container" action="" method="POST">
                <p>
                    <input type="text" placeholder="Email" name="user">
                </p>
                <p>
                    <input type="password" placeholder="Password" name="pass">
                </p>
                <p>
                    <input type="submit" value="Login" class="btn" name="submit">
                </p>
            </form>
      
        <?php
            if(isset($_POST ['submit'])){

                $user = mysqli_real_escape_string ($conn, $_POST['user']);
                $pass = $_POST['pass'];

                $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE username= '" .$user."' ");
                if (mysqli_num_rows ($cek)>0){

                    $d = mysqli_fetch_object($cek);
                    if (md5($pass == $d -> password)){

                    $_SESSION ['status_login'] = true;
                    $_SESSION ['uid'] = $d->id;
                    $_SESSION ['uname'] = $d->nama;
                    $_SESSION ['ulevel'] = $d->level;

                    echo "<script> window.location = 'admin/index-admin.php' </script>";

                    }else{
                        echo '<div class="alert">Password salah </div>';
                    }
                }else{
                        echo '<div class="alert"> username tidak ditemukan';
                }
            }
            ?>

        </div>

</body>

</html>