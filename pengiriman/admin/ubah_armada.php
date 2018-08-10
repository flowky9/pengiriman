<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Ubah Data Armada</h2></td>
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
	
	$produk = mysql_query("select * from produk where kd_produk='$id'") or die (mysql_error());
	$data_produk = mysql_fetch_array($produk);
	
	?>
    
    <form action="?module=Update_Produk&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="14%">Kode Produk</td>
    	<td width="86%">
        <h4><?php echo $data_produk['kd_produk'];?></h4>
    	</td>
    </tr>
    <tr>
    	<td width="14%">Nama Produk</td>
    	<td width="86%">
    	<input type="text" name="nama" value="<?php echo $data_produk['nm_produk'];?>"/>
    	<span class="error"><?php echo $error['nama'];?></span>
    	</td>
    </tr>
    <tr>
    	<td>Deskripsi</td>
    	<td>
    	<textarea name="deskripsi"><?php echo $data_produk['deskripsi'];?></textarea>
    	<span class="error"><?php echo $error['deskripsi'];?></span>
    	</td>
    </tr>
    <tr>
    	<td>Gambar Baru</td>
        <td>
        <input type="file" name="gambar" />
        <span class="error">(Jika ingin input Gambar Baru)</span>
        </td>
    </tr>
    <tr>
    	<td width="14%">Harga</td>
    	<td width="86%">
    	<input type="text" name="harga" value="<?php echo $data_produk['harga'];?>"/>
    	<span class="error"><?php echo $error['harga'];?></span>
    	</td>
    </tr>
    <tr>
    	<td width="14%">Stok</td>
    	<td width="86%">
    	<input type="number" name="stok" value="<?php echo $data_produk['stok'];?>"/>
    	<span class="error"><?php echo $error['stok'];?></span>
    	</td>
    </tr>
    <tr>
    	<td width="14%">Kategori</td>
    	<td width="86%">
    	<select name="kategori">
        
        <?php
			$merk_op = mysql_query("select * from kategori where kd_kategori='".$data_produk['kd_kategori']."'") or die (mysql_error());
			$select_merk_op = mysql_fetch_array($merk_op);
		?>
        <option value="<?php echo $data_produk['kd_kategori'];?>"><?php echo $select_merk_op['nm_kategori'];?></option>
        
        <?php
		$merk = mysql_query("select * from kategori order by nm_kategori asc") or die (mysql_error());
		while($data_merk = mysql_fetch_array($merk)){
		?>
        <option value="<?php echo $data_merk['kd_kategori'];?>"><?php echo $data_merk['nm_kategori'];?></option>
        <?php } ?>
        
        </select>
    	<span class="error"><?php echo $error['kategori'];?></span>
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Produk">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>