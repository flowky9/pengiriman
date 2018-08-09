<?php

$no_transaksi = $_GET['no_transaksi'];

$detail = mysql_query("select * from transaksi_detail where no_transaksi='$no_transaksi'") or die (mysql_error());
while($data_detail = mysql_fetch_array($detail)){
	$kd_produk = $data_detail['kd_produk'];
	$jumlah = $data_detail['jumlah'];

	$back_stok = mysql_query("update produk set stok=stok+$jumlah where kd_produk='$kd_produk'") or die (mysql_error());
}

$batal = mysql_query("update transaksi set status='Batal' where no_transaksi='$no_transaksi'") or die (mysql_error());

echo "<meta http-equiv='refresh' content='0;url=?module=Data_Transaksi'>"

?>