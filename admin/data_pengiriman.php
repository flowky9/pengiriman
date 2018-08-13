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
        <a class="button small grey fontB" href="?module=Tambah_Pengiriman">Tambah Pengiriman</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="4%">No</td>
        <td width="11%">Kode Pengiriman</td>
        <td width="18%">Deskripsi</td>
        <td width="12%">Total Bayar (Rp)</td>
        <td width="16%">DP</td>
        <td width="16%">Status</td>
        <td width="13%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;
       
	
	$hal = isset ($_GET['hal']) ? $_GET['hal'] : null;
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select kd_pengiriman,description,total_bayar,dp,status from pengiriman order by kd_pengiriman desc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['kd_pengiriman'];?></td>
        <td><?php echo $array['description'];?></td>
        <td><?php echo format_angka($array['total_bayar']);?></td>
        <td><?php echo format_angka($array['dp']);?></td>
        <td><?php echo $array['status'];?></td>
        <td class="table-tools" align="center">
        <?php
		if($array['status'] == "proses"){
		?>
        <a href="?module=Proses_Lunas&id=<?php echo $array['kd_pengiriman'];?>" title="Proses Lunas">
        <img src="../images/check.gif" />
        </a>
        <?php } ?>

        <a href="?module=Ubah_Pengiriman&id=<?php echo $array['kd_pengiriman'];?>" title="Ubah Pengiriman">
        <img src="../images/magnifier.gif" />
        </a>
        <a href="?module=Hapus&id=<?php echo $array['kd_pengiriman'];?>&execute=transaksi" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['kd_pengiriman'];?> ?');"><img src="../images/trash.gif" /></a>
        <a href="cetak_invoice.php?id=<?php echo $array['kd_pengiriman'];?>" title="Cetak" onclick="return confirm ('Anda yakin ingin mencetak <?php echo $array['kd_pengiriman'];?> ?');"><img src="../images/print.gif" /></a>

        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="8">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from pengiriman") or die (mysql_error());
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