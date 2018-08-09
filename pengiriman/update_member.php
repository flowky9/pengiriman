<?php

$kd_member = $_GET['kd_member'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$error = array();

$format_nama = "^[A-Za-z ]+$";
$format_password = "^[a-z1-9]+$";

if(empty($nama)){
	$error['nama'] = "*Nama Lengkap tidak boleh kosong!";
}
elseif(!eregi($format_nama,$nama)){
	$error['nama'] = "*Nama Lengkap harus diisi dengan huruf!";
}

if(empty($email)){
	$error['email'] = "*Email tidak boleh kosong!";
}

if(empty($telepon)){
	$error['telepon'] = "*Telepon tidak boleh kosong!";
}
elseif(!is_numeric($telepon)){
	$error['telepon'] = "*Telepon harus diisi dengan angka!";
}

if(empty($alamat)){
	$error['alamat'] = "*Alamat tidak boleh kosong!";
}

if(!empty($password)){
	if(!eregi($format_password,$password)){
		$error['password'] = "*Password harus terdiri dari huruf atau angka dan tanpa spasi atau tanda baca lainnya!";
	}
}

if(empty($error)){
	if(empty($password)){
		$update = mysql_query("update member set nm_member='$nama', email='$email', no_tlp='$telepon', alamat='$alamat' where kd_member='$kd_member'") or die (mysql_error());
	}
	else{
		$update = mysql_query("update member set nm_member='$nama', email='$email', no_tlp='$telepon', alamat='$alamat', password=MD5('$password') where kd_member='$kd_member'") or die (mysql_error());
	}
	echo "<script>alert('Profil Member berhasil diubah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
else{
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Profil_Member'>";
}

?>