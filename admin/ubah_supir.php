<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Ubah Data Supir</h2></td>
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
	$data_supir = mysql_fetch_array($merk);
	
	?>
    
    <form action="?module=Update_Supir&id=<?php echo $id;?>" method="post">
    <table class="form" width="100%" border="0">
        <tr>
            <td width="14%">Nama Supir</td>
            <td width="86%">
            <input type="text" name="nm_lengkap" value="<?php echo isset($data_supir['nm_lengkap']) ? $data_supir['nm_lengkap']  : false;?>"/>
            <span class="error"><?php echo isset($error['nm_lengkap']) ? $error['nm_lengkap'] : false;?></span>
            </td>
        </tr>
        <tr>
            <td width="14%">Nomor Hp</td>
            <td width="86%">
            <input type="text" name="no_hp" value="<?php echo isset($data_supir['no_hp']) ?  $data_supir['no_hp'] : false;?>"/>
            <span class="error"><?php echo isset($error['no_hp']) ? $error['no_hp'] : false;?></span>
            </td>
        </tr>
        <tr>
            <td width="14%">Alamat</td>
            <td width="86%">
            <input type="text" name="alamat" value="<?php echo isset($data_supir['alamat']) ? $data_supir['alamat'] : false;?>"/>
            <span class="error"><?php echo isset($error['alamat']) ? $error['alamat'] : false;?></span>
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