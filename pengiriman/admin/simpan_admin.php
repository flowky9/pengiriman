<?php

$error=false;

include_once "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$error = array();

$pola_username = "^[a-z1-9]+$";

$admin= mysql_query("select * from admin where username='$username'") or die (mysql_error());


if(empty($username)){
	$error['username'] = "*Username tidak boleh kosong!"; 
}
elseif(!eregi($pola_username,$username)){
	$error['username'] = "*Username tidak boleh menggunakan spasi dan tanda baca!";
}
elseif(mysql_num_rows($admin) > 0){
	$error['username'] = "*Username sudah digunakan!";
}

if(empty($password)){
	$error['password'] = "*Password tidak boleh kosong!";
}
elseif(!eregi($pola_username,$password)){
	$error['pass'] = "*Password tidak boleh menggunakan spasi dan tanda baca!";
}
elseif(mysql_num_rows($admin) > 0){
	$error['password'] = "*Password sudah digunakan!";
}
if(empty($error)){
	$simpan = mysql_query("insert into admin values('', '$username', '$password')") or die (mysql_error());
	echo "<script>alert('Data berhasil ditambah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Admin'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Tambah_Admin'>";
}

?>