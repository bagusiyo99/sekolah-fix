<?php include ('header.php'); ?>

    <div class="contenti">

        <div class="containeri">

            <div class="box">

                <div class="box-header1">
                        JURUSAN
                </div>
                <div class="box-body1">
                    <a class="btnsecondary" href="tinformasi-admin.php"> Tambah Data</a>

                    
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
                                <th>Judul</th>
                                <th>Keterangan</th>
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
                            $where .= " AND judul Like '%".$_GET['kata_cari']."%' ";
                        // }
                        }

                            $informasi = mysqli_query ($conn, "SELECT * FROM informasi $where ORDER BY id DESC");
                            if (mysqli_num_rows($informasi)> 0){
                                while($p =mysqli_fetch_array($informasi)){
                            ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $p['judul']; ?></td>
                                <td width="400"><?= $p['keterangan']; ?> </td>
                                <td><img src="../informasi/<?= $p['gambar'] ?>" width="300" height="200"></td>

                                <td width="100">
                                    <a href="editinformasi-admin.php?id=<?= $p ['id']?>"><i class="las la-edit  la-2x lasi"></i> </a>
                                    <br><br>
                                    <a href="hpsinformasi-admin.php?idinformasi=<?= $p ['id']?>"><i class="las la-trash-alt  la-2x lasii" onclick="return confirm ('Yakin ingin Hapus')"></i>    </a>
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
