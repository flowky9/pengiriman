<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Ubah Data Propinsi</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    
    <?php
	
	$id = $_GET['id'];
	
	if(isset($_SESSION['error'])){
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	$propinsi = mysql_query("select * from harga where kd_harga='$id'") or die (mysql_error());
	$data_propinsi = mysql_fetch_array($propinsi);
	
	?>
    
    <form action="?module=Update_Propinsi&id=<?php echo $id;?>" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Nama Propinsi</td>
    	<td width="86%">
    	<input type="text" name="wilayah" value="<?php echo $data_propinsi['wilayah'];?>"/>
    	<span class="error"><?php echo isset($error['wilayah']) ? $error['wilayah'] : false;?></span>
    	</td>
    </tr>
    <tr>
    	<td>Biaya Kirim</td>
    	<td>
    	<input type="text" name="biaya" value="<?php echo $data_propinsi['biaya_kirim'];?>"/>
    	<span class="error"><?php echo isset($error['biaya']) ? $error['biaya'] : false;?></span>
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Propinsi">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>