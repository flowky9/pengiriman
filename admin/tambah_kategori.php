<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Tambah Data Kategori</h2></td>
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
    
    <form action="?module=Simpan_Kategori" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Nama Kategori</td>
    	<td width="86%">
    	<input type="text" name="nama" value="<?php echo $_POST['nama'];?>"/>
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