<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Propinsi</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="4">
        <a class="button small grey fontB" href="?module=Tambah_Propinsi">Tambah Data</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="5%">No</td>
        <td width="26%">Nama Propinsi</td>
        <td width="54%">Biaya Kirim (Rp)</td>
        <td width="15%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;
		
	$hal = isset($_GET['hal']) ? $_GET['hal'] : null;
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select * from harga order by kd_wil asc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['wilayah'];?></td>
        <td><?php echo format_angka($array['biaya_kirim']);?></td>
        <td class="table-tools" align="center">
        <a href="?module=Ubah_Propinsi&id=<?php echo $array['kd_wil'];?>" title="Ubah"><img src="../images/pencil.gif" /></a>
        <a href="?module=Hapus&id=<?php echo $array['kd_wil'];?>&execute=propinsi" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['nm_propinsi'];?> ?');"><img src="../images/trash.gif" /></a>
        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="4">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from harga") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Propinsi&hal=$h'>$h</a>";
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