<?php

if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

$transaksi = mysql_query("select * from transaksi where kd_member='".$_SESSION['kd_member_log']."' order by no_transaksi desc") or die (mysql_error());

?>

<table width="100%" border="0"><br>
<tr>
	<td class="judul-halaman"><h2>Data Transaksi</h2></td>
</tr>
<tr>
	<td class="content-halaman">
    <br/>
    <table class="table-warna" border="0" width="100%">
    <tr class="head">
    <td width="3%">No</td>
    <td width="14%">No. Transaksi</td>
    <td width="15%">Nama Pemesan</td>
    <td width="16%">Total Bayar (Rp)</td>
    <td width="16%">Biaya Kirim (Rp)</td>
    <td width="14%">Sub Total (Rp)</td>
    <td width="7%">Status</td>
    <td width="15%"></td>
    </tr>
    
    <?php

	while($data_transaksi = mysql_fetch_array($transaksi)){
		$no++;
		
		$propinsi = mysql_query("select * from propinsi where kd_propinsi='".$data_transaksi['kd_propinsi']."'") or die (mysql_error());
		$data_propinsi = mysql_fetch_array($propinsi);
		
		$subtotal = $data_transaksi['total_bayar'] + $data_propinsi['biaya_kirim'];
	?>
 	<tr class="data">
    <td><?php echo $no;?></td>
    <td><?php echo $data_transaksi['no_transaksi'];?></td>
    <td><?php echo $data_transaksi['nama'];?></td>
    <td><?php echo format_angka($data_transaksi['total_bayar']);?></td>
    <td><?php echo format_angka($data_propinsi['biaya_kirim']);?></td>
    <td><?php echo format_angka($subtotal);?></td>
    <td><?php echo $data_transaksi['status'];?></td>
    <td align="center" class="table-tools">
    	
		<?php
		if($data_transaksi['status'] == "Pesan"){
		?>
    	<a href="?module=Konfirmasi&no_transaksi=<?php echo $data_transaksi['no_transaksi'];?>" title="Konfirmasi"><img src="images/check.gif" /></a>
        <a href="?module=Batal_Transaksi&no_transaksi=<?php echo $data_transaksi['no_transaksi'];?>" title="Batal" onclick="return confirm('Anda yakin ingin membatalkan transaksi <?php echo $data_transaksi['no_transaksi'];?> ?');"><img src="images/stop.gif" /></a>
    	<?php } ?>
        
    	<a href="?module=Detail-Transaksi&no_transaksi=<?php echo $data_transaksi['no_transaksi'];?>" title="Detail"><img src="images/magnifier.gif" /></a>
    </td>
    </tr>
    <?php } ?>
    
    </table>
    </td>
</tr>
</table>