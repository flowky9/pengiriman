<?php

include_once "../library/library.php";

$nm_lengkap = $_POST['nm_lengkap'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$kd_driver = $_GET['id'];
$error = array();

echo $kd_driver;

if(empty($no_hp) OR empty($alamat) OR empty($nm_lengkap)){
	$error['nm_lengkap'] = "*Nama tidak boleh kosong!";
	$error['no_hp'] = "*Nomor hp tidak boleh kosong!";
	$error['alamat'] = "*Alamat tidak boleh kosong!";
}

if(empty($error)){
	$simpan = mysql_query("update driver set nm_lengkap='$nm_lengkap', no_hp='$no_hp', alamat='$alamat' where kd_driver='$kd_driver'") or die (mysql_error());
	echo "<script>alert('Data berhasil diupdate!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Supir'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	
}

?>