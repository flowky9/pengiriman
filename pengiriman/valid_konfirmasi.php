<?php

$no_transaksi = $_GET['no_transaksi'];

$nama = $_POST['nama'];
$no_rek = $_POST['no_rek'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$error = array();

$format_nama = "^[A-Za-z ]+$";

$transaksi = mysql_query("select * from transaksi where no_transaksi='$no_transaksi'") or die (mysql_error());
$data_transaksi = mysql_fetch_array($transaksi);
	$total_bayar = $data_transaksi['total_bayar'];
	$kd_propinsi = $data_transaksi['kd_propinsi'];
	
$propinsi = mysql_query("select * from propinsi where kd_propinsi='$kd_propinsi'") or die (mysql_error());
$data_propinsi = mysql_fetch_array($propinsi);
	$biaya_kirim = $data_propinsi['biaya_kirim'];
	
	$total = $total_bayar + $biaya_kirim;

if(empty($nama)){
	$error['nama'] = "Atas Nama tidak boleh kosong!";
}
elseif(!eregi($format_nama,$nama)){
	$error['nama'] = "Atas Nama harus diisi dengan huruf!";
}

if(empty($no_rek)){
	$error['no_rek'] = "No. Rekening tidak boleh kosong!";
}
elseif(!is_numeric($no_rek)){
	$error['no_rek'] = "No. Rekening harus diisi dengan angka!";
}

if(empty($jumlah)){
	$error['jumlah'] = "Jumlah Transfer tidak boleh kosong!";
}
elseif(!is_numeric($jumlah)){
	$error['jumlah'] = "Jumlah Transfer harus diisi dengan angka!";
}
elseif($jumlah < $total){
	$error['jumlah'] = "Jumlah Transfer kurang!";
}

if(empty($error)){
	
	$tanggal = date('Y-m-d');
	
	$simpan = mysql_query("insert into konfirmasi values ('', '$no_transaksi', '$nama', '$no_rek', '$jumlah', '$tanggal', '$keterangan')") or die (mysql_error());
	
	$update = mysql_query("update transaksi set status='Proses' where no_transaksi='$no_transaksi'") or die (mysql_error());
	
	echo "<script>alert('Konfirmasi telah dikirim, selanjutnya kami akan mengirimkan nomor resi melalui email')</script>";
	echo "<meta http-equiv='refresh' content='0;url=?module=Data_Transaksi'>";
}
else{
	$_SESSION['post'] = $_POST;
	$_SESSION['error'] = $error;
	echo "<meta http-equiv='refresh' content='0;url=?module=Konfirmasi&no_transaksi=$no_transaksi'>";
}

?>