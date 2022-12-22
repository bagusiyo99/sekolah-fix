<?php include ('header.php'); ?>

    <div class="contenti">

        <div class="containeri">

            <div class="box">

                <div class="box-header1">
                        JURUSAN
                </div>
                <div class="box-body1">
                    <a class="btnsecondary" href="tgaleri-admin.php"> Tambah Data</a>

                    
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
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Aksi sisissis</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no =1;
                            $where = " WHERE 1=1 ";
                        // if(isset($_GET['yuk'])){
                            if(isset($_GET['kata_cari'])) {
                            $where .= " AND keterangan Like '%".$_GET['kata_cari']."%' ";
                        // }
                        }

                            $galeri = mysqli_query ($conn, "SELECT * FROM galeri $where ORDER BY id DESC");
                            if (mysqli_num_rows($galeri)> 0){
                                while($p =mysqli_fetch_array($galeri)){
                            ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><img src="../galeri/<?= $p['foto'] ?>" width="400" height="140"></td>
					            <td><?= $p['keterangan']; ?></td>
                                <td>
                                    <a href="editgaleri-admin.php?id=<?= $p ['id']?>" class="btnprimary " >Edit</a>
                                    <a href="hpsgaleri-admin.php?idgaleri=<?= $p ['id']?>" class="btndanger" onclick="return confirm ('Yakin ingin Hapus')">Hapus</a>
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
