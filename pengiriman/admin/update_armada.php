<?php

$error=false;

include_once "../config/koneksi.php";
include_once "../library/library.php";

$id_armada = $_GET['id_armada'];

$id_armada = $_POST['id_armada'];
$nm_armada = $_POST['nm_armada'];
$no_mobil = $_POST['no_plat'];
// $no_stnk = $_POST['no_stnk'];
$gambar = $_FILES['gambar']['name'];
$nm_lengkap = $_POST['nm_lengkap'];
$error = array();


if(empty($nm_armada)){
	$error['nm_armada'] = "*Nama Armada tidak boleh kosong!";
}

if(empty($no_plat)){
	$error['no_plat'] = "*No Pol tidak boleh kosong!";
}

if(empty($gambar)){
	$error['gambar'] = "Gambar tidak boleh kosong!";
}

if($nm_lengkap == 0){
	$error['nm_lengkap'] = "Silahkan pilih Nama Supir!";
}

if(empty($error)){
	
	if(empty($gambar)){
		$simpan = mysql_query("update armada set nm_armada='$nm_armada', no_plat='$no_plat', id_driver='$driveer' where id_armada='$id'") or die (mysql_error());
	}
	else{
		$simpan = mysql_query("update armada set nm_armada='$nm_armada', no_plat='$no_plat', gambar='$gambar',id_driver='$driver' where id_armada='$id'") or die (mysql_error());
		copy($_FILES['gambar']['tmp_name'],"../images/produk/".$gambar);
	}
	
	echo "<script>alert('Data berhasil diubah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Produk'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Ubah_Armada&id=$id'>";
}

?>