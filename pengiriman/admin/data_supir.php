<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Supir</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="3">
        <a class="button small grey fontB" href="?module=Tambah_Kategori">Tambah Data</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="5%">No</td>
        <td width="80%">Nama Kategori</td>
        <td width="15%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;
	
	$hal = $_GET['hal'];
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select * from kategori order by nm_kategori asc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['nm_kategori'];?></td>
        <td class="table-tools" align="center">
        <a href="?module=Ubah_Kategori&id=<?php echo $array['kd_kategori'];?>" title="Ubah"><img src="../images/pencil.gif" /></a>
        <a href="?module=Hapus&id=<?php echo $array['kd_kategori'];?>&execute=kategori" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['nm_kategori'];?> ?');"><img src="../images/trash.gif" /></a>
        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="3">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from kategori") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Kategori&hal=$h'>$h</a>";
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