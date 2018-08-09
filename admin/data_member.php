<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Data Customer</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    <td class="top-button" align="right" colspan="5">
    	<a class="button small grey fontB" href="?module=Tambah_Member">Tambah Customer</a>
        </td>
    </tr>
    <tr class="head">
    	<td width="6%">No</td>
        <td width="22%">Nama Perusahaan</td>
        <td width="22%">Nama Customer</td>
        <td width="28%">Email</td>
        <td width="18%">No. Telepon</td>
           </tr>
    
    <?php
	$batas = 10;
	
	$hal = isset($_GET['hal']) ? $_GET['hal'] :null ;
	if(empty($_GET['hal'])){
		$hal = 1;
	}
	
	$pos = ($hal - 1) * $batas;
	 
	$q = mysql_query("select * from customer order by kd_customer asc limit $pos, $batas") or die (mysql_error());
	while($array_q = mysql_fetch_array($q)){
		$pos++;
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
    	 <td><?php echo $array_q['nm_perusahaan'];?></td>
        <td><?php echo $array_q['nm_member'];?></td>
        <td><?php echo $array_q['email'];?></td>
        <td><?php echo $array_q['no_hp'];?></td>
            </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="5">
    	Halaman :
		
		<?php
	
		$data = mysql_query("select * from customer") or die (mysql_error());
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Data_Member&hal=$h'>$h</a>";
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