<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Tambah Data Propinsi</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    
    <?php
	
	if(isset($_SESSION['post'])){
		$_POST = $_SESSION['post'];
		$error = $_SESSION['error'];
		unset($_SESSION['post']);
		unset($_SESSION['error']);
	}
	
	?>
    
    <form action="?module=Simpan_Propinsi" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Nama Propinsi</td>
    	<td width="86%">
    	<input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : false;?>"/>
    	<span class="error"><?php echo isset($error['nama']) ? $error['nama'] : false;?></span>
    	</td>
    </tr>
    <tr>
    	<td>Biaya Kirim</td>
    	<td>
    	<input type="text" name="biaya" value="<?php echo isset($_POST['biaya']) ? $_POST['biaya'] : false;?>"/>
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