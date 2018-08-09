<?php

$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$error = array();

$format_nama = "^[A-Za-z ]+$";
$format_password = "^[a-z1-9]+$";
$format_email = "^.+@.+\..+$";

if(empty($nama)){
	$error['nama'] = "*Nama Lengkap tidak boleh kosong!";
}
elseif(!eregi($format_nama,$nama)){
	$error['nama'] = "*Nama Lengkap harus diisi dengan huruf!";
}

$data_email = mysql_query("select * from member where email='$email'") or die (mysql_error());

if(empty($email)){
	$error['email'] = "*Email tidak boleh kosong!";
}
elseif(!eregi($format_email, $email)){
	$error['email'] = "*Tulis Email dengan benar, contoh: \"akmal@gmail.com\"!";
}
elseif(mysql_num_rows($data_email) > 0){
	$error['email'] = "*Email sudah digunakan!";
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

if(empty($password)){
	$error['password'] = "*Password tidak boleh kosong!";
}
elseif(!eregi($format_password,$password)){
	$error['password'] = "*Password harus terdiri dari huruf atau angka dan tanpa spasi atau tanda baca lainnya!";
}

if(empty($error)){
	$simpan = mysql_query("insert into member values('','$nama', '$email', '$telepon', '$alamat', '$password')") or die (mysql_error());
	echo "<script>alert('Pendaftaran berhasil, silahkan login dengan email dan password anda')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Beranda'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Daftar'>";
}

?>