<?php

$error=false;

include_once "../config/koneksi.php";
include_once "../library/library.php";

$id_armada = buatKode("armada", "AR","id_armada");

$tgl_masuk = date('Y-m-d');

$id_armada = $_POST['id_armada'];
$nm_armada = $_POST['nm_armada'];
$no_mobil = $_POST['no_plat'];
// $no_stnk = $_POST['no_stnk'];
$gambar = $_FILES['gambar']['name'];
$nm_lengkap = $_POST['nm_lengkap'];


	$simpan = mysql_query("insert into armada values ('$id_armada', '$nm_armada', '$no_mobil', '$gambar', '$nm_lengkap',)") or die (mysql_error());
	copy($_FILES['gambar']['tmp_name'],"../images/armada/".$gambar);
	

	if($simpan){
		header("location:http://localhost/pengiriman/admin/index.php?module=Data_Armada");
	}



?>