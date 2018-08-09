<?php

$k = mysql_query("select * from keranjang") or die (mysql_error());
while($data_k = mysql_fetch_array($k)){
	
$d_jam = substr($data_k['jam'],0,2);
$d_menit = substr($data_k['jam'],3,2);
			
$d_tgl = substr($data_k['tanggal'],-2);
$d_bulan = substr($data_k['tanggal'],5,2);
$d_tahun = substr($data_k['tanggal'],0,4);

$tgl_exp_k = $d_tgl+1;
	
date_default_timezone_set("asia/jakarta");
$date=getdate();
			
$hour = $date['hours'];
$minute = $date['minutes'];
$second = $date['seconds'];
			
$month = $date['mon'];
$day = $date['mday'];
$year = $date['year'];
	
	if($hour >= $d_jam && $minute >= $d_menit && $day >= $tgl_exp_k){
		$item_k = mysql_query("select * from keranjang where kd_keranjang='".$data_k['kd_keranjang']."'") or die (mysql_error());
		while($data_item_k = mysql_fetch_array($item_k)){
		$jumlah_k = $data_item_k['jumlah'];
		$kd_produk_k = $data_item_k['kd_produk'];
		$update_stok_k = mysql_query("update produk set stok=stok+$jumlah_k where kd_produk='$kd_produk_k'") or die (mysql_error());
		}
		$dlt_k = mysql_query("delete from keranjang where kd_keranjang='".$data_k['kd_keranjang']."'") or die (mysql_error());
	}
	elseif($day > $tgl_exp_k or $month > $d_bulan or $year > $d_tahun){
		$item_k = mysql_query("select * from keranjang where kd_keranjang='".$data_k['kd_keranjang']."'") or die (mysql_error());
		while($data_item_k = mysql_fetch_array($item_k)){
		$jumlah_k = $data_item_k['jumlah'];
		$kd_produk_k = $data_item_k['kd_produk'];
		$update_stok_k = mysql_query("update produk set stok=stok+$jumlah_k where kd_produk='$kd_produk_k'") or die (mysql_error());
		}
		$dlt_k = mysql_query("delete from keranjang where kd_keranjang='".$data_k['kd_keranjang']."'") or die (mysql_error());
	}
	
}

?>