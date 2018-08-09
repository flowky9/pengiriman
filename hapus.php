<?php

$kd_keranjang = $_GET['kd_keranjang'];

$keranjang = mysql_query("select * from keranjang where kd_keranjang='$kd_keranjang'") or die (mysql_error());
$data_keranjang = mysql_fetch_array($keranjang);

$kd_produk = $data_keranjang['kd_produk'];
$jumlah = $data_keranjang['jumlah'];

$hapus = mysql_query("delete from keranjang where kd_keranjang='$kd_keranjang'") or die (mysql_error());
$up_stok = mysql_query("update produk set stok=stok+$jumlah where kd_produk='$kd_produk'") or die (mysql_error());

echo "<meta http-equiv='refresh' content='0;url=?module=Keranjang'>";

?>