<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Ubah Data Armada</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    
    <?php
	
	$id = $_GET['id'];
	$error = false;
	if(isset($_SESSION['error'])){
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	$produk = mysql_query("select * from armada where kd_armada='$id'") or die (mysql_error());
	$data_armada = mysql_fetch_array($produk);
	
	?>
    
    <form action="?module=Update_Armada&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Kode Produk</td>
    	<td width="86%">
        <h4><?php echo $data_armada['kd_armada'];?></h4>
    	</td>
    </tr>
    <tr>
        <td width="14%">Nama Armada</td>
        <td width="86%">
        <input type="text" required="required" name="nm_armada" value="<?php echo (isset($data_armada['nm_armada'])) ? $data_armada['nm_armada'] : false;?>"/>
        <span class="error"><?php echo isset($error['nm_armada']) ? $error['nm_armada'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td width="14%">No Plat</td>
        <td width="86%">
        <input type="text" required="required" name="no_plat" value="<?php echo (isset($data_armada['no_mobil'])) ?$data_armada['no_mobil'] : false;?>"/>
        <span class="error"><?php echo isset($error['no_plat']) ? $error['no_plat'] : false;?></span>
        </td>
        </td>
    </tr>
    
    <tr>
        <td>Gambar</td>
        <td>
        <input type="file" name="gambar" />
        <span class="error"><?php echo isset($error['gambar']) ?  $error['gambar'] : false;?></span>
        <br><br>
        <img width='100' src="<?php echo '../images/armada/'.$data_armada['gambar'] ?>" alt="">
        </td>
    </tr>
    <tr>
        <td width="14%">Nama Supir</td>
        <td width="86%">
        <select name="nm_lengkap">
        
        <?php
        $driverpost = isset($_POST['driver']) ? $_POST['driver'] : false;
        if($driverpost == 0){
        ?>
        <option required="required" value="0">- Pilih Driver -</option>
        <?php } else{
            $merk_op = mysql_query("select * from driver where id_driver='".$_POST['driver']."'") or die (mysql_error());
            $select_merk_op = mysql_fetch_array($merk_op);
        ?>
        <option value="<?php echo $_POST['id_driver'];?>"><?php echo $select_merk_op['nm_lengkap'];?></option>
        <?php } ?>
        
        <!-- nama DRIVER -->
        <?php
        $merk = mysql_query("select * from driver order by nm_lengkap asc") or die (mysql_error());
        while($data_merk = mysql_fetch_array($merk)){
        ?>
        <option <?php if($data_armada['kd_driver'] == $data_merk[0] ) echo "selected=selected"  ?> value="<?php echo $data_merk[0]; ?>"><?php echo $data_merk['nm_lengkap'];?></option>
        <?php } ?>
        
        </select>
        <span class="error"><?php echo isset($error['driver']) ? $error['driver'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Armada">Kembali</a>
        </td>
    </tr>    </table>
    </form>
    
    </td>
</tr>
</table>