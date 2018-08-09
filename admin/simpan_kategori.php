<?php

$nama = $_POST['nama'];
$error = array();

if(empty($nama)){
	$error['nama'] = "*Nama Kategori tidak boleh kosong!";
}

if(empty($error)){
	$simpan = mysql_query("insert into kategori values('', '$nama')") or die (mysql_error());
	echo "<script>alert('Data berhasil ditambah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Kategori'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Tambah_Kategori'>";
}

?>