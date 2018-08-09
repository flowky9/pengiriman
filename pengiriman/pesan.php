<?php

$cek_keranjang = mysql_query("select * from keranjang where kd_member='".$_SESSION['kd_member_log']."'") or die (mysql_error());

if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
elseif(mysql_num_rows($cek_keranjang) < 1){
	echo "<script>alert('Keranjang Belanja masih kosong!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Keranjang'>";
}

if(isset($_SESSION['post'])){
	$_POST = $_SESSION['post'];
	$error = $_SESSION['error'];
	unset($_SESSION['post']);
	unset($_SESSION['error']);
}

?>

<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Pemesanan</h2></td>
</tr>
<tr>
	<td class="content-halaman">
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr class="head">
    	<td width="4%">No</td>
        <td>Kode Produk</td>
    	<td>Nama Produk</td>
    	<td width="20%">Harga (Rp)</td>
    	<td width="9%">Jumlah</td>
    	<td width="19%">Sub Total (Rp)</td>
    </tr>
    
	<?php
	$keranjang = mysql_query("select * from keranjang where kd_member='".$_SESSION['kd_member_log']."' order by kd_keranjang desc") or die (mysql_error());
	while($data_keranjang = mysql_fetch_array($keranjang)){
		$produk = mysql_fetch_array(mysql_query("select * from produk where kd_produk='".$data_keranjang['kd_produk']."'")) or die (mysql_error());
		
		$total_jumlah += $data_keranjang['jumlah'];
		$sub_total = $produk['harga'] * $data_keranjang['jumlah'];
		$total += $sub_total;
		$no++;
	?>
    <tr class="data">
    	<td><?php echo $no;?></td>
    	<td width="18%"><?php echo $data_keranjang['kd_produk'];?></td>
    	<td width="30%"><?php echo $produk['nm_produk'];?></td>
    	<td><?php echo format_angka($produk['harga']);?></td>
    	<td><?php echo $data_keranjang['jumlah'];?></td>
    	<td><?php echo format_angka($sub_total);?></td>
    </tr>
    <?php } ?>
    
    <tr class="data">
    	<td colspan="3"></td>
        <td><b>Total : </b></td>
        <td width="9%"><b><?php echo $total_jumlah;?></b></td>
    	<td width="19%"><b>Rp. <?php echo format_angka($total);?></b></td>
    </tr>
    </table>
    </td>
</tr>
<tr>
	<td class="content-halaman">
    <br/>
    <form action="?module=Proses_Pesan" method="post">
    <input type="hidden" name="total_bayar" value="<?php echo $total;?>" />
    <table class="form" width="100%" border="0">
    <tr>
    	<td colspan="2"><div class="line-dashed"></div></td>
    </tr>
    <tr>
    	<td width="15%">Nama Pemesan</td>
        <td width="85%">
        <input type="text" name="nama" value="<?php echo $_POST['nama'];?>">
        <span class="error"><?php echo $error['nama'];?></span>
        </td>
    </tr>
    <tr>
    	<td>Telepon</td>
        <td>
        <input type="text" name="telepon" value="<?php echo $_POST['telepon'];?>">
        <span class="error"><?php echo $error['telepon'];?></span>
        </td>
    </tr>
    <tr>
    	<td>Alamat</td>
        <td>
        <textarea name="alamat"><?php echo $_POST['alamat'];?></textarea>
        <span class="error"><?php echo $error['alamat'];?></span>
        </td>
    </tr>
    <tr>
    	<td>Propinsi</td>
        <td>
        <select name="propinsi">
        
		<?php
		if($_POST['propinsi'] == 0){
		?>
        	<option value="0">- Pilih Propinsi -</option>
        <?php
        }
		else {
			$select_propinsi = mysql_query("select * from propinsi where kd_propinsi='".$_POST['propinsi']."'") or die (mysql_error());
			$data_select_propinsi = mysql_fetch_array($select_propinsi);
		?>
        	<option value="<?php echo $_POST['propinsi'];?>"><?php echo $data_select_propinsi['nm_propinsi'];?></option>
        <?php } ?>
        
        <?php
		$propinsi = mysql_query("select * from propinsi order by nm_propinsi asc") or die (mysql_error());
		while($data_propinsi = mysql_fetch_array($propinsi)){
		?>
        <option value="<?php echo $data_propinsi['kd_propinsi'];?>"><?php echo $data_propinsi['nm_propinsi'];?></option>
        <?php } ?>
        
        </select>
        <span class="error"><?php echo $error['propinsi'];?></span>
        </td>
    </tr>
    <tr>
    	<td>Kota</td>
        <td>
        <input type="text" name="kota" value="<?php echo $_POST['kota'];?>">
        <span class="error"><?php echo $error['kota'];?></span>
        </td>
    </tr>
    <tr>
    	<td>Kode POS</td>
        <td>
        <input type="text" name="kd_pos" value="<?php echo $_POST['kd_pos'];?>">
        <span class="error"><?php echo $error['kd_pos'];?></span>
        </td>
    </tr>
    <tr>
    	<td colspan="2"><div class="line-dashed"></div></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        <input class="btn-kiri" type="submit" name="proses" value="Proses">
        <a class="btn-kanan" href="?module=Produk">Lanjutkan Belanja</a>
        </td>
    </tr>
    </table>
    </form>
    </td>
</tr>
</table>