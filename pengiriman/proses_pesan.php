<?php

$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$propinsi = $_POST['propinsi'];
$kota = $_POST['kota'];
$kd_pos = $_POST['kd_pos'];
$total_bayar = $_POST['total_bayar'];
$error = array();

$format_nama = "^[A-Za-z ]+$";

if(empty($nama)){
	$error['nama'] = "*Nama Pemesan tidak boleh kosong!";
}
elseif(!eregi($format_nama,$nama)){
	$error['nama'] = "*Nama Pemesan harus diisi dengan huruf!";
}

if(empty($telepon)){
	$error['telepon'] = "*Telepon tidak boleh kosong!";
}
elseif(!is_numeric($telepon)){
	$error['telepon'] = "*Telepon harus diisi dengan angka!";
}

if(empty($alamat)){
	$error['alamat'] = "*Alamat tidak boleh kosong!";
}

if($propinsi == 0){
	$error['propinsi'] = "*Silahkan pilih propinsi tujuan!";
}

if(empty($kota)){
	$error['kota'] = "*Kota tidak boleh kosong!";
}
elseif(!eregi($format_nama,$kota)){
	$error['kota'] = "*Kota harus diisi dengan huruf!";
}

if(empty($kd_pos)){
	$error['kd_pos'] = "*Kode POS tidak boleh kosong!";
}
elseif(!is_numeric($kd_pos)){
	$error['kd_pos'] = "*Kode POS diisi dengan angka!";
}

if(empty($error)){
	
	date_default_timezone_set("asia/jakarta");
	$date=getdate();
	$hour=$date['hours'];
	$minute=$date['minutes'];
	$second=$date['seconds'];
	$tanggal = date('Y-m-d');
	$jam = "$hour:$minute:$second";
	
	$no_transaksi = buatKode("transaksi", "T");
	$keranjang = mysql_query("select * from keranjang where kd_member='".$_SESSION['kd_member_log']."'") or die (mysql_error());
	while($data_keranjang = mysql_fetch_array($keranjang)){
		$kd_produk = $data_keranjang['kd_produk'];
		$jumlah = $data_keranjang['jumlah'];
		
		$simpan_detail = mysql_query("insert into transaksi_detail values('', '$no_transaksi', '$kd_produk', '$jumlah')") or die (mysql_error());
	}
		$simpan = mysql_query("insert into transaksi values('$no_transaksi', '$nama', '$telepon', '$alamat', '$kota', '$kd_pos', '$tanggal', '$jam', '$total_bayar', '$propinsi', '".$_SESSION['kd_member_log']."', 'Pesan')") or die (mysql_error());
		
		$hapus_keranjang = mysql_query("delete from keranjang where kd_member='".$_SESSION['kd_member_log']."'");
		echo "<script>alert('Pemesanan berhasil! Selanjutnya lakukan pembayaran dan konfirmasi')</script>";
		echo "<meta http-equiv='refresh' content='0;url=?module=Data_Transaksi'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Pemesanan'>";
}

?>