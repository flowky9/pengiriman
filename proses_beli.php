<?php

$kd_produk = $_GET['kd_produk'];
date_default_timezone_set("asia/jakarta");
$date=getdate();
$hour=$date['hours'];
$minute=$date['minutes'];
$second=$date['seconds'];
$tanggal = date('Y-m-d');
$jam = "$hour:$minute:$second";

if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	echo "<script>alert('Silahkan Login lebih dulu!');history.go(-1);</script>";
}
else{
	$produk = mysql_query("select * from produk where kd_produk='$kd_produk'") or die (mysql_error());
	$data_produk = mysql_fetch_array($produk);
	$stok = $data_produk['stok'];
	if($stok < 1){
		echo "<script>alert('Stok tidak mencukupi!');history.go(-1);</script>";
	}
	else{
		$keranjang = mysql_query("select * from keranjang where kd_produk='$kd_produk' and kd_member='".$_SESSION['kd_member_log']."'") or die (mysql_error());
		if(mysql_num_rows($keranjang) > 0){
			$up_keranjang = mysql_query("update keranjang set jumlah=jumlah+1 where kd_produk='$kd_produk' and kd_member='".$_SESSION['kd_member_log']."'") or die (mysql_error());
		}
		else{
			$in_keranjang = mysql_query("insert into keranjang values ('', '$kd_produk', '$tanggal', '$jam', '1', '".$_SESSION['kd_member_log']."')") or die (mysql_error());
		}
		$up_stok = mysql_query("update produk set stok=stok-1 where kd_produk='$kd_produk'") or die (mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=?module=Keranjang'>";
	}
}
	
?>