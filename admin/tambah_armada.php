<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Tambah Data Armada</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    
    <?php
    $error=false;
	
	if(isset($_SESSION['post'])){
		$_POST = $_SESSION['post'];
		$error = $_SESSION['error'];
		unset($_SESSION['post']);
		unset($_SESSION['error']);
	}
	
	$id_armada = buatKode("armada", "AR","kd_armada");
	
	?>
    
    <form action="simpan_armada.php" method="post" enctype="multipart/form-data">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Kode Armada</td>
    	<td width="86%">
        <h4><?php echo $id_armada?></h4>
        <input type="hidden" name="id_armada" value="<?php echo $id_armada; ?>">
    	</td>
    </tr>
    <tr>
        <td width="14%">Nama Armada</td>
    	<td width="86%">
    	<input type="text" required="required" name="nm_armada" value="<?php echo (isset($_POST['nm_armada'])) ?$_POST['nm_armada'] : false;?>"/>
    	<span class="error"><?php echo $error['nm_armada'];?></span>
    	</td>
    </tr>
    <tr>
    	<td width="14%">No Plat</td>
    	<td width="86%">
        <input type="text" required="required" name="no_plat" value="<?php echo (isset($_POST['no_plat'])) ?$_POST['no_plat'] : false;?>"/>
        <span class="error"><?php echo $error['no_plat'];?></span>
        </td>
    	</td>
    </tr>
    
    <tr>
    	<td>Gambar</td>
        <td>
        <input type="file" required="required" name="gambar" />
        <span class="error"><?php echo $error['gambar'];?></span>
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
        <option value="<?php echo $data_merk[0]; ?>"><?php echo $data_merk['nm_lengkap'];?></option>
        <?php } ?>
        
        </select>
    	<span class="error"><?php echo $error['driver'];?></span>
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Armada">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>