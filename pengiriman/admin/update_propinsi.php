<?php

$id = $_GET['id'];

$wilayah = $_POST['wilayah'];
$biaya = $_POST['biaya'];
$error = array();

$pola_nama = "^[A-Za-z ]+$";

if(empty($wilayah)){
	$error['wilayah'] = "*Nama Propinsi tidak boleh kosong!";
}
elseif(!eregi($pola_nama,$nama)){
	$error['wilayah'] = "*Nama Propinsi harus diisi dengan huruf!";
}

if(empty($biaya)){
	$error['biaya'] = "*Biaya Kirim tidak boleh kosong!";
}
elseif(!is_numeric($biaya)){
	$error['biaya'] = "*Biaya Kirim harus diisi dengan angka!";
}

if(empty($error)){
	$simpan = mysql_query("update harga set wilayah='$wilayah', biaya_kirim='$biaya' where kd_harga='$id'") or die (mysql_error());
	echo "<script>alert('Data berhasil diubah!')</script>";
	
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	
}

?>