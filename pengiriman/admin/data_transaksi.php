<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Pengiriman</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="8">
        <a class="button small grey fontB" href="?module=Laporan_Transaksi">Laporan</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="4%">No</td>
        <td width="11%">No. Trans</td>
        <td width="18%">Nama</td>
        <td width="12%">Tanggal</td>
        <td width="16%">Total Bayar (Rp)</td>
        <td width="16%">Biaya Kirim (Rp)</td>
        <td width="10%">Status</td>
        <td width="13%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;
       
	
	$hal = isset ($_GET['hal']) ? $_GET['hal'] : null;
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select * from transaksi order by no_transaksi desc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$propinsi = mysql_query("select * from propinsi where kd_propinsi='".$array['kd_propinsi']."'") or die (mysql_error());
		$data_propinsi = mysql_fetch_array($propinsi);
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['no_transaksi'];?></td>
        <td><?php echo $array['nama'];?></td>
        <td><?php echo $array['tanggal'];?></td>
        <td><?php echo format_angka($array['total_bayar']);?></td>
        <td><?php echo format_angka($data_propinsi['biaya_kirim']);?></td>
        <td><?php echo $array['status'];?></td>
        <td class="table-tools" align="center">
        <?php
		if($array['status'] == "Pesan" or $array['status'] == "Proses"){
		?>
        <a href="?module=Proses_Lunas&id=<?php echo $array['no_transaksi'];?>" title="Proses Lunas">
        <img src="../images/check.gif" />
        </a>
        <?php } ?>
        <a href="?module=Detail_Transaksi&id=<?php echo $array['no_transaksi'];?>" title="Detail Transaksi">
        <img src="../images/magnifier.gif" />
        </a>
        <?php
		if($array['status'] == "Batal"){
		?>
        <a href="?module=Hapus&id=<?php echo $array['no_transaksi'];?>&execute=transaksi" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['no_transaksi'];?> ?');"><img src="../images/trash.gif" /></a>
        <?php } ?>
        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="8">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from transaksi") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Transaksi&hal=$h'>$h</a>";
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