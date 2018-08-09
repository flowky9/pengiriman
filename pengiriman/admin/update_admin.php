<?php

$id = $_GET['id'];

$user = $_POST['user'];
$pass = $_POST['pass'];
$error = array();

$pola_user = "^[a-z1-9]+$";

if(empty($user)){
	$error['user'] = "*Username tidak boleh kosong!";
}
elseif(!eregi($pola_user,$user)){
	$error['user'] = "*Username tidak boleh menggunakan spasi dan tanda baca!";
}

if(!empty($pass)){
	if(!eregi($pola_user,$pass)){
		$error['pass'] = "*Password tidak boleh menggunakan spasi dan tanda baca!";
	}
}

if(empty($error)){
	if(empty($pass)){
		$update = mysql_query("update admin set username='$user' where kd_admin='$id'") or die (mysql_error());
	}
	else{
		$update = mysql_query("update admin set username='$user', password='$pass' where kd_admin='$id'") or die (mysql_error());
	}
	echo "<script>alert('Data berhasil diubah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Admin'>";
}
else{
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Ubah_Admin&id=$id'>";
}

?>