<?php

$email = $_POST['email'];
$password = $_POST['password'];

$cek_email = mysql_query("select * from member where email='$email'") or die (mysql_error());
$data_member = mysql_fetch_array($cek_email);

if(empty($email) && empty($password)){
	echo "<script>window.alert('Email dan Password tidak boleh kosong!');history.go(-1)</script>";
}
elseif(empty($email)){
	echo "<script>window.alert('Email tidak boleh kosong!');history.go(-1)</script>";
}
elseif(mysql_num_rows($cek_email) < 1){
	echo "<script>window.alert('Email salah!');history.go(-1)</script>";
}
elseif(mysql_num_rows($cek_email) > 0 && $password == ""){
	echo "<script>window.alert('Password tidak boleh kosong!');history.go(-1)</script>";
}
elseif(mysql_num_rows($cek_email) > 0 && $password != $data_member['password']){
	echo "<script>window.alert('Password salah!');history.go(-1)</script>";
}
else{
	$_SESSION['kd_member_log'] = $data_member['kd_member'];
	$_SESSION['member_log_name'] = substr($email,0,strpos("$email","@"));
	echo "<script>window.alert('Login berhasil. Selamat datang ".$_SESSION['member_log_name']."!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Beranda'>";
}

?>