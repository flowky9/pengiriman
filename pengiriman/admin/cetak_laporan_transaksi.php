<?php

$svr = "localhost";
$uname = "root";
$pwd = "";
$db = "pegasus_db";

$conn = mysqli_connect($svr,$uname,$pwd,$db) OR die("Gagal Koneksi : ".mysqli_connect_error());
include "../library/library.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. PEGASUS GLOBAL SOLUSINDO|| INVOICE</title>
</head>

<link rel="stylesheet" type="text/css" href="../css/cetak.css" />

<body>



<table width="800" border="0" align="center">
<tr>
	<td align="center"><h2>Laporan Transaksi</h2></td>
</tr>
<tr>
<td>
	<br/>
    <br/>
    <div class="line-dashed"></div>
    <br/>
	<table class="form" width="100%" border="0">
	<tr>
		<td width="127">Tgl. Cetak</td><td width="17">:</td>
        <td width="392"><?php echo date('d-m-Y');?></td>
    	<td width="468" align="right"></td><td width="19" align="right">:</td>
        <td width="56" align="right"></td>
	</tr>
	<tr>
		<td>Periode</td><td>:</td><td><?php echo (isset($_POST['tgl1'])) ? $_POST['tgl1'] : false ;?> - <?php echo (isset($_POST['tgl2'])) ? $_POST['tgl2'] : false ;?></td>
    	<td></td><td></td><td></td>
	</tr>
	</table>
    
    <br/>
    <div class="line-dashed"></div>
    <br/>
    
    <table class="table-list" width="100%" border="0">
    <tr class="head">
    	<td width="7%">No</td>
        <td width="11%">No. Trans</td>
        <td width="21%">Nama</td>
        <td width="12%">Tanggal</td>
        <td width="16%">Total Bayar (Rp)</td>
        <td width="16%">Biaya Kirim (Rp)</td>
        <td width="17%">Sub Total (Rp)</td>
    </tr>
    
    <?php
    $total = false;
    $pos = 1;
    $tgl1 = isset($_POST['tgl1']) ? $_POST['tgl1'] : false;
    $tgl2 = isset($_POST['tgl2']) ? $_POST['tgl2'] : false;
    if($tgl1 && $tgl2){
        $between = "AND transaksi.tanggal BETWEEN '$tgl1' AND '$tgl2'";
    }else {
        $between = "";
    }

 
    $propinsi = mysqli_query($conn,"SELECT transaksi.*,propinsi.biaya_kirim FROM transaksi JOIN propinsi ON transaksi.kd_propinsi = propinsi.kd_propinsi $between");
	while($array = mysqli_fetch_array($propinsi)){
		
		// $data_propinsi = mysqli_fetch_array($propinsi);
		// $pos++;
		
		$subtotal = $array['total_bayar'] + $array['biaya_kirim'] ;

        $total = $total + $subtotal; //
		
		//$total += $subtotal;

        
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['no_transaksi'];?></td>
        <td><?php echo $array['nama'];?></td>
        <td><?php echo $array['tanggal'];?></td>
        <td><?php echo format_angka($array['total_bayar']);?></td>
        <td><?php echo format_angka($array['biaya_kirim']);?></td>
        <td><?php echo format_angka($subtotal);?></td>
    </tr>
    <?php $pos++; } ?>
    <tr class="data">
    	<td colspan="6" align="center"><h3>Total :</h3></td>
        <td><b><?php echo format_angka($total);?></b></td>
    </tr>
    </table>
</td>
</tr>
</table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>