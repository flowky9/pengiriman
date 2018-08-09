<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Supir</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="5">
        <a class="button small grey fontB" href="?module=Tambah_Supir">Tambah Data</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="5%">No</td>
        <td width="20%">Nama Lengkap</td>
        <td width="20%">Nomor Phone</td>
        <td width="45%">Alamat</td>
        <td width="20%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;
	
	
	if(empty($_GET['hal'])){
		$hal = 1;
	}else {
		$hal = $_GET['hal'];
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select * from driver order by kd_driver asc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['nm_lengkap'];?></td>
        <td><?php echo $array['no_hp'];?></td>
        <td><?php echo $array['alamat'];?></td>
        <td class="table-tools" align="center">
        <a href="?module=Ubah_Supir&id=<?php echo $array['kd_driver'];?>" title="Ubah"><img src="../images/pencil.gif" /></a>
        <a href="?module=Hapus&id=<?php echo $array['kd_driver'];?>&execute=supir" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['kd_driver'];?> ?');"><img src="../images/trash.gif" /></a>
        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="3">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from driver") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Supir&hal=$h'>$h</a>";
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