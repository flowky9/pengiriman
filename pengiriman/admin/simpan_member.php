<?php

$error=false;

include_once "../config/koneksi.php";
include_once "../library/library.php";

$nm_perusahaan = $_POST['nm_perusahaan'];
$nm_customer = $_POST['nm_customer'];
$kd_customer = buatKode("customer","CS","kd_customer");
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$error = array();

$pola_nm_perusahaan = "^[a-z1-9]+$";
$pola_nama = "^[A-Za-z ]+$";

$customer= mysql_query("select * from customer where nm_perusahaan='$nm_perusahaan'") or die (mysql_error());


if(empty($nm_perusahaan)){
	$error['nm_perusahaan'] = "*Nama Perusahaan tidak boleh kosong!"; 
}
elseif(mysql_num_rows($customer) > 0){
	$error['nm_perusahaan'] = "*Nama Perusahaan sudah ada!";
}

if(empty($nm_customer)){
	$error['nm_customer'] = "*Nama Customer tidak boleh kosong!";
}
elseif(!eregi($pola_nama,$nm_perusahaan)){
	$error['nm_customer'] = "*Nama Perusahaan harus diisi dengan huruf!";
}
elseif(mysql_num_rows($customer) > 0){
	$error['nm_member'] = "*Password sudah digunakan!";
}
if(empty($email)){
	$error['email'] = "*Email tidak boleh kosong!";
}
elseif(mysql_num_rows($customer) > 0){
	$error['email'] = "*email sudah digunakan!";
}
if(empty($no_hp)){
	$error['no_hp'] = "*No HP tidak boleh kosong!";
}
elseif(!is_numeric($no_hp)){
	$error['no_hp'] = "*No HP harus diisi dengan angka!";
}
elseif(mysql_num_rows($customer) > 0){
	$error['no_hp'] = "*No Telp sudah digunakan!";
}

if(empty($error)){
	$simpan = mysql_query("insert into customer values('$kd_customer', '$nm_perusahaan','$nm_customer' ,'$email','$no_hp')") or die (mysql_error());
	echo "<script>alert('Data berhasil ditambah!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Member'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Tambah_Member'>";
}

?>