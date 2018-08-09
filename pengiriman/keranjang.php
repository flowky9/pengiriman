<?php

if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	echo "<script>alert('Silahkan Login lebih dulu!');history.go(-1);</script>";
}

?>

<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Keranjang Belanja</h2></td>
</tr>
<tr>
	<td class="content-halaman">
    <br/>
    <table class="table-warna" width="100%" border="0">
    	<tr class="head">
    	<td>Produk</td>
    	<td>Nama Produk</td>
    	<td width="16%">Harga (Rp)</td>
    	<td width="27%">Jumlah</td>
    	<td width="18%">Sub Total (Rp)</td>
    	<td width="6%"></td>
    </tr>
    
	<?php
	$keranjang = mysql_query("select * from keranjang where kd_member='".$_SESSION['kd_member_log']."' order by kd_keranjang desc") or die (mysql_error());
	while($data_keranjang = mysql_fetch_array($keranjang)){
		$produk = mysql_fetch_array(mysql_query("select * from produk where kd_produk='".$data_keranjang['kd_produk']."'")) or die (mysql_error());
		$sub_total = $produk['harga'] * $data_keranjang['jumlah'];
		$total += $sub_total;
	?>
    <tr class="data">
    	<td width="10%"><img src="images/produk/<?php echo $produk['gambar'];?>" width="100" height="100"></td>
    	<td width="23%"><?php echo $produk['nm_produk'];?></td>
    	<td><?php echo format_angka($produk['harga']);?></td>
    	<td>
        <form action="?module=Update&kd_keranjang=<?php echo $data_keranjang['kd_keranjang'];?>" method="post">
        <input type="number" name="jumlah" value="<?php echo $data_keranjang['jumlah'];?>">
        <input class="button small grey" type="submit" value="Update">
        </form>
        </td>
    	<td><?php echo format_angka($sub_total);?></td>
    	<td><a href="?module=Hapus&kd_keranjang=<?php echo $data_keranjang['kd_keranjang'];?>" title="Hapus"><img src="images/Delete-icon.png" width="50" height="50"></a></td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td colspan="6" align="right"><br/><h2>Total : Rp. <?php echo format_angka($total);?>,-</h2></td>
    </tr>
    </table>
    <br/>
    </td>
</tr>
<tr>
	<td class="info-box"><h4>Catatan : </h4>Total harga belum termasuk biaya kirim.</td>
</tr>
<tr>
	<td align="right">
    <br/>
    <a class="btn-kiri" href="?module=Produk">Lanjutkan Belanja</a>
    <a class="btn-kanan" href="?module=Pemesanan">Selesai Belanja &raquo;</a>
    </td>
</tr>
</table>