<?php

include_once "../library/library.php";

$nm_lengkap = $_POST['nm_lengkap'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$kd_driver = buatKode('driver','DR','kd_driver');
$error = array();

echo $kd_driver;

if(empty($no_hp) OR empty($alamat) OR empty($nm_lengkap)){
	$error['nm_lengkap'] = "*Nama tidak boleh kosong!";
	$error['no_hp'] = "*Nomor hp tidak boleh kosong!";
	$error['alamat'] = "*Alamat tidak boleh kosong!";
}

if(empty($error)){
	$simpan = mysql_query("insert into driver values('$kd_driver', '$nm_lengkap','$no_hp','$alamat')") or die (mysql_error());
	echo "<script>alert('Data berhasil ditambah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Supir'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Tambah_Supir'>";
}

?>