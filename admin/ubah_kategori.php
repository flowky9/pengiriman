<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Ubah Data Kategori</h2></td>
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
	
	$merk = mysql_query("select * from driver where kd_driver='$id'") or die (mysql_error());
	$data_merk = mysql_fetch_array($merk);
	
	?>
    
    <form action="?module=Update_Kategori&id=<?php echo $id;?>" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Nama Kategori</td>
    	<td width="86%">
    	<input type="text" name="nama" value="<?php echo $data_merk['nm_kategori'];?>"/>
    	<span class="error"><?php echo $error['nama'];?></span>
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Kategori">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>