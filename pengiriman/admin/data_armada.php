<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Armada</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="top-button" align="right" colspan="7">
        <a class="button small grey fontB" href="?module=Tambah_Armada">Tambah Data</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="3%">No</td>
        <td width="10%">Gambar</td>
        <td width="8%">ID ARMADA</td>
        <td width="8%">NAMA ARMADA</td>
        <td width="10%">NOMOR MOBIL</td>
        <td>NAMA SUPIR</td>
        <td width="7%" align="center">Tools</td>
    </tr>
    
    <?php
	$batas = 10;

    
	
	$hal = isset($_GET['hal']) ? $_GET['hal'] : null;
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$query = mysql_query("select armada.*,driver.nm_lengkap from armada,driver where armada.id_driver = driver.id_driver order by id_armada desc limit $pos, $batas") or die (mysql_error());
	while($array = mysql_fetch_array($query)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><img src="../images/armada/<?php echo $array['gambar'];?>" width="70" height="70"></td>
        <td><?php echo $array['id_armada'];?></td>
        <td><?php echo $array['nm_armada'];?></td>
        <td><?php echo $array['no_mobil'];?></td>
        <td><?php echo $array['nm_lengkap'];?></td>
        <td class="table-tools" align="center">
        <a href="?module=Ubah_Armada&id=<?php echo $array['id_armada'];?>" title="Ubah"><img src="../images/pencil.gif" /></a>
        <a href="?module=Hapus&id=<?php echo $array['id_armada'];?>&execute=armada" title="Hapus" onclick="return confirm ('Anda yakin ingin menghapus <?php echo $array['nm_armada'];?> ?');"><img src="../images/trash.gif" /></a>
        </td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="7">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from armada") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Armada&hal=$h'>$h</a>";
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