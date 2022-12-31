<?php include ('header.php'); ?>

    <div class="contenti">

        <div class="containeri">

            <div class="box">

                <div class="box-header1">
                        GURU
                </div>
                <div class="box-body1">
                    <a class="btnsecondary" href="tguru.php"> Tambah Data</a>

                    
                    <form  action="" class="wrap" >
                        <div class="search">
                            <input type="text" name="kata_cari" class="searchTerm" placeholder="Pencarian"  >
                            <button type="submit" class="searchButton">
                                <i class="las la-search"></i>
                            </button>                
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>mapel</th>
                                <th>Gambar</th>
                                <th>Aksi </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no =1;
                            $where = " WHERE 1=1 ";
                        // if(isset($_GET['yuk'])){
                            if(isset($_GET['kata_cari'])) {
                            $where .= " AND nama Like '%".$_GET['kata_cari']."%' ";
                        // }
                        }

                            $guru = mysqli_query ($conn, "SELECT * FROM guru $where ORDER BY id DESC");
                            if (mysqli_num_rows($guru)> 0){
                                while($p =mysqli_fetch_array($guru)){
                            ?>
                            <tr>
                                <td><?= $no++?></td>
					            <td><?php echo $p['nama']; ?></td>
					            <td width="200"><?php echo $p['mapel']; ?></td>
					            <td><img src="../guru/<?php echo $p['gambar'] ?>" width="400" height="300"></td>
                                <td width="200">
                                    <a href="editguru.php?id=<?= $p ['id']?>" ><i class="las la-edit  la-2x lasi"></i> </a>
                                    <br><br>
                                    <a href="hpsguru.php?idguru=<?= $p ['id']?>"><i class="las la-trash-alt  la-2x lasii" onclick="return confirm ('Yakin ingin Hapus')"></i>    </a>
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
