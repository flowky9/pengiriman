<?php

session_start();

include "../config/koneksi.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

$cek_user = mysql_query("select * from admin where username='$user'") or die (mysql_error());
$data_admin = mysql_fetch_array($cek_user);

if(empty($user) && empty($pass)){
	echo "<script>window.alert('Username dan Password tidak boleh kosong!');history.go(-1)</script>";
}
elseif(empty($user)){
	echo "<script>window.alert('Username tidak boleh kosong!');history.go(-1)</script>";
}
elseif(mysql_num_rows($cek_user) < 1){
	echo "<script>window.alert('Username salah!');history.go(-1)</script>";
}
elseif(mysql_num_rows($cek_user) > 0 && $pass == ""){
	echo "<script>window.alert('Password tidak boleh kosong!');history.go(-1)</script>";
}
elseif(mysql_num_rows($cek_user) > 0 && $pass != $data_admin['password']){
	echo "<script>window.alert('Password salah!');history.go(-1)</script>";
}
else{
	$q = mysql_query("select * from admin where username='$user' and password='$pass'") or die (mysql_error());
	$arr_q = mysql_fetch_array($q);
	if(mysql_num_rows($q) > 0){
		$_SESSION['kd_admin_log'] = $arr_q['kd_admin'];
		$_SESSION['nm_admin_log'] = $arr_q['username'];
		echo "<script>alert('Selamat datang ".$_SESSION['nm_admin_log']."')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
	else{
		echo "<script>alert('Username atau Password Salah')</script>";
		echo "<meta http-equiv='refresh' content='0;url=login_admin.php'>";
	}
}

?>