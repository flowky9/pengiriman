<?php

$error=false;

include_once "../config/koneksi.php";
include_once "../library/library.php";

$kd_armada = $_GET['id'];

$nm_armada = $_POST['nm_armada'];
$no_mobil = $_POST['no_plat'];
// $no_stnk = $_POST['no_stnk'];
$gambar = $_FILES['gambar']['name'];
$driver = $_POST['nm_lengkap'];
$error = array();

if(empty($error)){
	
	if(empty($gambar)){
		$simpan = mysql_query("update armada set nm_armada='$nm_armada', no_mobil='$no_mobil', kd_driver='$driver' where kd_armada='$kd_armada'") or die (mysql_error());
	}
	else{
		$simpan = mysql_query("update armada set nm_armada='$nm_armada', gambar='$gambar', no_mobil='$no_mobil', kd_driver='$driver' where kd_armada='$kd_armada'") or die (mysql_error());
		copy($_FILES['gambar']['tmp_name'],"../images/armada/".$gambar);
	}
	
	echo "<script>alert('Data berhasil diubah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Armada'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Ubah_Armada&id=$id'>";

	
}

?>