<?php

$nama = $_POST['nama'];
$biaya = $_POST['biaya'];
$error = array();

$pola_nama = "^[A-Za-z ]+$";

if(empty($nama)){
	$error['nama'] = "*Nama Propinsi tidak boleh kosong!";
}
elseif(!eregi($pola_nama,$nama)){
	$error['nama'] = "*Nama Propinsi harus diisi dengan huruf!";
}

if(empty($biaya)){
	$error['biaya'] = "*Biaya Kirim tidak boleh kosong!";
}
elseif(!is_numeric($biaya)){
	$error['biaya'] = "*Biaya Kirim harus diisi dengan angka!";
}

if(empty($error)){
	$simpan = mysql_query("insert into propinsi values('', '$nama', '$biaya')") or die (mysql_error());
	echo "<script>alert('Data berhasil ditambah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Propinsi'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Tambah_Propinsi'>";
}

?>