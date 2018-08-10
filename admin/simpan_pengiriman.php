<?php

$error=false;

include_once "../config/koneksi.php";
include_once "../library/library.php";

$kd_pengiriman = $_POST['kd_pengiriman'];
$description = $_POST['description'];
$tanggal = date('Y-m-d');
$satuan = $_POST['satuan'];
$kd_armada = $_POST['kd_armada'];
$kd_driver = $_POST['kd_driver'];
$kd_customer = $_POST['kd_customer'];
$nm_penerima = $_POST['nm_penerima'];
$uang_supir = $_POST['uang_supir'];
$harga = $_POST['harga'];
$total_bayar = $harga + $uang_supir  ;
$status = $_POST['status'];
$packinglist = $_POST['packinglist'];
$dp = $_POST['dp'];

echo $kd_pengiriman . "<br>".
$description . "<br>".
$tanggal . "<br>".
$satuan . "<br>".
$kd_armada . "<br>".
$kd_driver . "<br>".
$kd_customer . "<br>".
$nm_penerima . "<br>".
$uang_supir . "<br>".
$harga . "<br>".
$total_bayar . "<br>".
$status . "<br>".
$packinglist . "<br>".
$dp . "<br>";



	$simpan = mysql_query("insert into pengiriman values ('$kd_pengiriman', '$description', '$tanggal', 

															'$satuan', '$kd_armada','$kd_driver',

														'$kd_customer', '$nm_penerima', '$uang_supir', 

															'$total_bayar', '$status','$packinglist',

														'$harga', '$dp')") or die (mysql_error());

	if($simpan){
		header("location:http://localhost/pengiriman/admin/index.php?module=Data_Pengiriman");
	}



?>