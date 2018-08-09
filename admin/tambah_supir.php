<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Tambah Data Supir</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    
    <?php
	
	if(isset($_SESSION['post'])){
		$_POST = $_SESSION['post'];
		$error = isset($_SESSION['error']) ? $_SESSION['error'] : false;
		unset($_SESSION['post']);
		unset($_SESSION['error']);
	}
	
	?>
    
    <form action="?module=Simpan_Supir" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Nama Supir</td>
    	<td width="86%">
    	<input type="text" name="nm_lengkap" value="<?php echo isset($_POST['nm_lengkap']) ? $_POST['nm_lengkap']  : false;?>"/>
    	<span class="error"><?php echo isset($error['nm_lengkap']) ? $error['nm_lengkap'] : false;?></span>
    	</td>
    </tr>
    <tr>
        <td width="14%">Nomor Hp</td>
        <td width="86%">
        <input type="text" name="no_hp" value="<?php echo isset($_POST['no_hp']) ?  $_POST['no_hp'] : false;?>"/>
        <span class="error"><?php echo isset($error['no_hp']) ? $error['no_hp'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td width="14%">Alamat</td>
        <td width="86%">
        <input type="text" name="alamat" value="<?php echo isset($_POST['alamat']) ? $_POST['alamat'] : false;?>"/>
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