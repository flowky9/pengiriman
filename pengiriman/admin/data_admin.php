<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Admin</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="4">
        <a class="button small grey fontB" href="?module=Tambah_Admin">Tambah Data</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="5%">No</td>
        <td width="26%">Username</td>
        <td width="54%">Password</td>
        <td width="15%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;
	
	$hal = isset ($_GET['hal']) ? $_GET['hal'] : null;
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select * from admin order by kd_admin asc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['username'];?></td>
        <td><input type="password" value="<?php echo $array['password'];?>" style="border:none;" disabled="disabled"/></td>
        <td class="table-tools" align="center">
        <a href="?module=Ubah_Admin&id=<?php echo $array['kd_admin'];?>" title="Ubah"><img src="../images/pencil.gif" /></a>
        <a href="?module=Hapus&id=<?php echo $array['kd_admin'];?>&execute=admin" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['username'];?> ?');"><img src="../images/trash.gif" /></a>
        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="4">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from admin") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Admin&hal=$h'>$h</a>";
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