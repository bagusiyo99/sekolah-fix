<?php include ('header.php'); ?>

    <div class="contenti">

        <div class="containeri">

            <div class="box">

                <div class="box-header1">
                    Pengguna
                </div>
                <div class="box-body1">
                    <a class="btnsecondary" href="tpengguna-admin.php"> Tambah Data</a>

                    <form  action="" class="wrap" >
                        <div class="search">
                            <input type="text" name="kata_cari" class="searchTerm" placeholder="Pencarian"  >
                            <button type="submit" class="searchButton">
                                <i class="las la-search"></i>
                            </button>                
                        </div>
                    </form>

                    <!-- <from action="" class="wrap">
                        <div class="search">
                            <input type="text" name="yuk" class="searchTerm" placeholder="Pencarian">
                            <button type="submit" class="searchButton">
                                <i class="las la-search"></i>
                            </button>
                        </div>
                    </from> -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi sisissis</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no =1;

                        $where = " WHERE 1=1 ";
                        
                            if(isset($_GET['kata_cari'])) {
                            $where .= " AND nama Like '%".$_GET['kata_cari']."%' ";

                    }

                            $pengguna = mysqli_query ($conn, "SELECT * FROM   pengguna $where  ORDER BY id DESC");
                            if (mysqli_num_rows($pengguna)> 0){
                                while($p =mysqli_fetch_array($pengguna)){
                            ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?=$p ['nama'] ?></td>
                                <td><?= $p ['username']?></td>
                                <td><?= $p ['level']  ?></td>
                                <td>
                                    <a href="editpengguna-admin.php?id=<?= $p ['id']?>" class="btnprimary " >Edit</a>
                                    <a href="hpspengguna-admin.php?idpengguna=<?= $p ['id']?>" class="btndanger" onclick="return confirm ('Yakin ingin Hapus')">Hapus</a>
                                </td>
                            </tr>
                        

                        <?php }}else { ?>
                            <tr>
                                <td colspan= "5">data tidak ada </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</body>

</html>

<?php include ('footer.php'); ?>
