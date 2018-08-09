<?php

$kd_keranjang = $_GET['kd_keranjang'];

$jumlah_up = $_POST['jumlah'];

if($_POST['jumlah'] < 1){
	$jumlah_up = 1;
}

$keranjang = mysql_query("select * from keranjang where kd_keranjang='$kd_keranjang'") or die (mysql_error());
$data_keranjang = mysql_fetch_array($keranjang);
$kd_produk = $data_keranjang['kd_produk'];
$jumlah = $data_keranjang['jumlah'];

$produk = mysql_query("select * from produk where kd_produk='$kd_produk'") or die (mysql_error());
$data_produk = mysql_fetch_array($produk);
$stok = $data_produk['stok'];

$stok_set = $stok + $jumlah;

if($jumlah_up > $stok_set){
	echo "<script>alert('Stok tidak mencukupi!')</script>";
}
else{
	$stok_up = mysql_query("update produk set stok=$stok_set-$jumlah_up where kd_produk='$kd_produk'") or die (mysql_error());
	$keranjang_up = mysql_query("update keranjang set jumlah='$jumlah_up' where kd_keranjang='$kd_keranjang'") or die (mysql_error());
}

echo "<meta http-equiv='refresh' content='0;url=?module=Keranjang'>";

?>