<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Laporan Transaksi</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    <table class="table-list" width="100%" border="0">
    <tr>
    	<td class="form" colspan="7" bgcolor="#EAEAEA" style="padding:10px;">
        
        <?php
		$batas = 10;
	
		$hal = isset($_GET['hal']) ? $_GET['hal'] : false;
		if(empty($_GET['hal'])){
			$hal = 1;
		}
	
		$pos = ($hal - 1) * $batas;
	 
		if(!empty($_GET['tgl1']) && !empty($_GET['tgl2'])){
			$query = mysql_query("select * from transaksi where tanggal between '".$_GET['tgl1']."' and '".$_GET['tgl2']."' and status='Lunas' order by no_transaksi desc limit $pos, $batas") or die (mysql_error());
		}
		?>
        
        <h4 style="margin-bottom:10px;">Periode</h4>
        <form action="cetak_laporan_transaksi.php"  method="post">
        <input type="date" name="tgl1" placeholder="yyyy-mm-dd" /> 
        <strong style="margin:0 5px;">s/d</strong> 
        <input type="date" name="tgl2" placeholder="yyyy-mm-dd" />
        <input class="button medium grey" type="submit" value="OK" style="margin-left:8px;"/>
        
        <?php
		// if(mysql_num_rows($query) > 0 ){
		?>

        <button name="submit" class="button medium grey fontB" style="float:right">Cetak <img src="../images/print.gif" style="margin-bottom:-3px;"/></button>
      <!--   <a class="button medium grey fontB" href="cetak_laporan_transaksi.php" target="_blank" style="float:right">
        Cetak
        <img src="../images/print.gif" style="margin-bottom:-3px;"/> -->
        </a>
        
        
        </form>
        </td>
    </tr>
    <tr>
    	<td colspan="7" height="20"></td>
    </tr>
    <tr class="head">
    	<td width="4%">No</td>
        <td width="11%">No. Trans</td>
        <td width="18%">Nama</td>
        <td width="12%">Tanggal</td>
        <td width="16%">Total Bayar (Rp)</td>
        <!-- <td width="16%">Biaya Kirim (Rp)</td> -->
        <td width="10%">Status</td>
    </tr>
    
    <?php
    $query = mysql_query("select * from transaksi") or die (mysql_error());

	while($array = mysql_fetch_array($query)){
		

		
		$pos++;   
	?>
    <tr class="data">
    	<td><?php echo $pos;?></td>
        <td><?php echo $array['no_transaksi'];?></td>
        <td><?php echo $array['nama'];?></td>
        <td><?php echo $array['tanggal'];?></td>
        <td><?php echo format_angka($array['total_bayar']);?></td>
        <!-- <td><?php echo format_angka($data_propinsi['biaya_kirim']);?></td> -->
        <td><?php echo $array['status'];?></td>
    </tr>
    <?php } ?>
    
    <tr>
    	<td class="halaman" colspan="7">
    	Halaman :
		
		<?php
		
		if(!empty($_GET['tgl1']) and !empty($_GET['tgl2'])){
		$data = mysql_query("select * from transaksi where tanggal between '".$_GET['tgl1']."' and '".$_GET['tgl2']."' and status='Lunas'") or die (mysql_error());
		}
		$row_data = mysql_num_rows($data);
		$jml_hal = ceil($row_data/$batas);
	
		for($h=1;$h<=$jml_hal;$h++){
			if($h != $hal){
				echo "<a href='?module=Laporan_Transaksi&hal=$h&tgl1=$tgl1&tgl2=$tgl2'>$h</a>";
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