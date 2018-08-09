<?php

$id = $_GET['id'];

$wilayah = $_POST['wilayah'];
$biaya = $_POST['biaya'];
$error = array();


if(empty($wilayah)){
	$error['wilayah'] = "*Nama Propinsi tidak boleh kosong!";
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
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Propinsi'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Ubah_Propinsi'>";
}

?>