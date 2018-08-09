<?php

$id = $_GET['id'];

$nama = $_POST['nama'];
$error = array();

if(empty($nama)){
	$error['nama'] = "*Nama Kategori tidak boleh kosong!";
}

if(empty($error)){
	$simpan = mysql_query("update kategori set nm_kategori='$nama' where kd_kategori='$id'") or die (mysql_error());
	echo "<script>alert('Data berhasil diubah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Kategori'>";
}
else{
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Ubah_Kategori&id=$id'>";
}

?>