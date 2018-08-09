<?php

$q = mysql_query("select * from transaksi") or die (mysql_error());
while($data_q = mysql_fetch_array($q)){
	
$data_jam = substr($data_q['jam'],0,2);
$data_menit = substr($data_q['jam'],3,2);
			
$data_tgl = substr($data_q['tanggal'],-2);
$data_bulan = substr($data_q['tanggal'],5,2);
$data_tahun = substr($data_q['tanggal'],0,4);

$tgl_exp = $data_tgl+1;
	
date_default_timezone_set("asia/jakarta");
$date=getdate();
			
$hour = $date['hours'];
$minute = $date['minutes'];
$second = $date['seconds'];
			
$month = $date['mon'];
$day = $date['mday'];
$year = $date['year'];
	
	if($hour >= $data_jam && $minute >= $data_menit && $day >= $tgl_exp && $data_q['status'] == "Pesan"){
		$update = mysql_query("update transaksi set status='Batal' where no_transaksi='".$data_q['no_transaksi']."'") or die (mysql_error());
		$item = mysql_query("select * from transaksi_detail where no_transaksi='".$data_q['no_transaksi']."'") or die (mysql_error());
		while($data_item = mysql_fetch_array($item)){
		$jumlah = $data_item['jumlah'];
		$kd_produk = $data_item['kd_produk'];
		$update_stok = mysql_query("update produk set stok=stok+$jumlah where kd_produk='$kd_produk'") or die (mysql_error());
		}
		
	}
	elseif($day > $tgl_exp && $data_q['status'] == "Pesan" or $month > $data_bulan && $data_q['status'] == "Pesan" or $year > $data_tahun && $data_q['status'] == "Pesan"){
		$update = mysql_query("update transaksi set status='Batal' where no_transaksi='".$data_q['no_transaksi']."'") or die (mysql_error());
		$item = mysql_query("select * from transaksi_detail where no_transaksi='".$data_q['no_transaksi']."'") or die (mysql_error());
		while($data_item = mysql_fetch_array($item)){
		$jumlah = $data_item['jumlah'];
		$kd_produk = $data_item['kd_produk'];
		$update_stok = mysql_query("update produk set stok=stok+$jumlah where kd_produk='$kd_produk'") or die (mysql_error());
		}
	}
	
}

?>