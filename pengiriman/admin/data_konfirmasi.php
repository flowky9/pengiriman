<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Konfirmasi</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="7">
        </td>
    </tr>
    <tr class="head">
    	<td width="4%">No</td>
        <td width="11%">No. Trans</td>
        <td width="12%">Tanggal</td>
        <td width="15%">Atas Nama</td>
        <td width="15%">No. Rekening</td>
        <td width="14%">Transfer (Rp)</td>
        <td width="17%">Keterangan</td>
    </tr>
    
    <?php
	$batas = 10;
	
	$hal = $_GET['hal'];
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select * from konfirmasi order by kd_konfirmasi desc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
    	<td><?php echo $array['no_transaksi'];?></td>
        <td><?php echo $array['tanggal'];?></td>
        <td><?php echo $array['nm_rekening'];?></td>
        <td><?php echo $array['no_rekening'];?></td>
        <td><?php echo format_angka($array['jml_transfer']);?></td>
        <td><?php echo $array['keterangan'];?></td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="7">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from konfirmasi") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Konfirmasi&hal=$h'>$h</a>";
			}
			else{
				echo "<span>[ $h ]</span>";
			}
		}
	
		?>
    
    	</td>
    </tr>
    </table>
    
    </td>
</tr>
</table>