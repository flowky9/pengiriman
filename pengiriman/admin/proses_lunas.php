<?php

$id = $_GET['id'];

$transaksi = mysql_query("select * from transaksi where no_transaksi='$id'") or die (mysql_error());
$data_transaksi = mysql_fetch_array($transaksi);

if($data_transaksi['status'] == "Proses"){
	mysql_query("update transaksi set status='Lunas' where no_transaksi='$id'");
	echo "<script>alert('Proses Lunas berhasil!');history.go(-1)</script>";
}
else{
	echo "<script>alert('Pembeli belum melakukan konfirmasi!');history.go(-1)</script>";
}

?>