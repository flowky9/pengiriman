<?php

$tgl1 = $_POST['tgl1'];
$tgl2 = $_POST['tgl2'];

if(empty($tgl1) or empty($tgl2)){
	echo "<script>window.alert('Tentukan periode transaksi!')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Laporan_Transaksi&tgl1=$tgl1&tgl2=$tgl2'>";
}
else{
	echo "<meta http-equiv='refresh' content='0;url=?module=Laporan_Transaksi&tgl1=$tgl1&tgl2=$tgl2'>";
}

?>