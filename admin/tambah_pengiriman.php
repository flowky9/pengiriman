<table class='pengiriman-tb' width="100%" border="0">
<tr>
    <td class="judul-halaman"><h2>Tambah Data Pengiriman</h2></td>
</tr>
<tr>
    <td>
    
    <br/>
    
    <?php
    $error=false;
    
    if(isset($_SESSION['post'])){
        $_POST = $_SESSION['post'];
        $error = $_SESSION['error'];
        unset($_SESSION['post']);
        unset($_SESSION['error']);
    }
    
    ?>
    
    <form action="?module=Simpan_Pengiriman" method="post">
    <table class="form" width="100%" border="0">
    <tr>
        <td width="12%">Kode Pengiriman</td>
        <td width="88%">
        <input type="text" name="kd_pengiriman" value="<?php echo buatKodeInv('pengiriman','kd_pengiriman').'/PGS/';?>"/>
        <span class ="error"><?php echo isset($error['kd_pengiriman']) ? $error['kd_pengiriman'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td width="12%">Description</td>
        <td width="88%">
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <span class ="error"><?php echo isset($error['nm_perusahaan']) ? $error['nm_perusahaan'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td>Satuan</td>
        <td>
        <input required="required" type="text" name="satuan" value="<?php echo (isset($_POST['nm_customer'])) ? $_POST['nm_customer'] : false;?>"/>

        <span class="error"><?php echo $error['nm_customer'];?></span>
        </td>
    </tr>
    <!-- ARMADA -->
     <tr>
        <td>Armada</td>
        <td>
        
        <select name="kd_armada" id="">

        <?php
		$merk = mysql_query("select * from armada order by kd_armada asc") or die (mysql_error());
		while($data_armada = mysql_fetch_array($merk)){
		?>
        <option value="<?php echo $data_armada[0]; ?>"><?php echo $data_armada[0].' ('.$data_armada[1].')';?></option>
        <?php } ?>
        	 
        </select>

        <span class="error"><?php echo $error['nm_customer'];?></span>
        </td>
    </tr>
    <!-- DRIVER -->
    <tr>
    	<td width="14%">Driver</td>
    	<td width="86%">
    	<select name="kd_driver">
        
        <?php
        $driverpost = isset($_POST['driver']) ? $_POST['driver'] : false;
		if($driverpost == 0){
		?>
        <option required="required" value="0">- Pilih Driver -</option>
        <?php } else{
			$merk_op = mysql_query("select * from driver where id_driver='".$_POST['driver']."'") or die (mysql_error());
			$select_merk_op = mysql_fetch_array($merk_op);
		?>
        <option value="<?php echo $_POST['id_driver'];?>"><?php echo $select_merk_op['nm_lengkap'];?></option>
        <?php } ?>
        
        <!-- nama DRIVER -->
        <?php
		$merk = mysql_query("select * from driver order by nm_lengkap asc") or die (mysql_error());
		while($data_merk = mysql_fetch_array($merk)){
		?>
        <option value="<?php echo $data_merk[0]; ?>"><?php echo $data_merk['nm_lengkap'];?></option>
        <?php } ?>
        
        </select>
    	<span class="error"><?php echo $error['driver'];?></span>
    	</td>
    </tr>
    <!-- CUSTOMER -->
    <tr>
    	<td width="14%">Customer</td>
    	<td width="86%">
    	<select name="kd_customer">
        
        <?php
        $driverpost = isset($_POST['driver']) ? $_POST['driver'] : false;
		if($driverpost == 0){
		?>
        <option required="required" value="0">- Pilih Customer -</option>
        <?php } else{
			$merk_op = mysql_query("select * from customer where id_driver='".$_POST['driver']."'") or die (mysql_error());
			$select_merk_op = mysql_fetch_array($merk_op);
		?>
        <option value="<?php echo $_POST['id_driver'];?>"><?php echo $select_merk_op['nm_lengkap'];?></option>
        <?php } ?>
        
        <!-- nama DRIVER -->
        <?php
		$merk = mysql_query("select * from customer order by nm_perusahaan asc") or die (mysql_error());
		while($data_merk = mysql_fetch_array($merk)){
		?>
        <option value="<?php echo $data_merk[0]; ?>"><?php echo $data_merk['nm_perusahaan'];?></option>
        <?php } ?>
        
        </select>
    	<span class="error"><?php echo $error['driver'];?></span>
    	</td>
    </tr>
    <!-- NAMA PENERIMA -->
    <tr>
        <td>Nama Penerima</td>
        <td>
        <input  required="required" type="text" name="nm_penerima" value="<?php echo (isset($_POST['nm_penerima'])) ? $_POST['nm_penerima'] : false;?>"/>

        <span class="error"><?php echo $error['nm_penerima'];?></span>
        </td>
    </tr>
    <!-- UANG SUPIR -->
    <tr>
        <td>Uang Supir</td>
        <td>
        <input required="required" type="number" name="uang_supir" value="<?php echo (isset($_POST['uang_supir'])) ? $_POST['uang_supir'] : false;?>"/>

        <span class="error"><?php echo isset($error['uang_supir']) ? $error['uang_supir'] : false;?></span>
        </td>
    </tr>
	<tr>
    	<td width="14%">Harga</td>
    	<td width="86%">
    	<select id='harga' name="harga">
        
        <?php
        $hargapost = isset($_POST['driver']) ? $_POST['driver'] : false;
		if($hargapost == 0){
		?>
        <option required="required" value="0">- Pilih Wilayah -</option>
        <?php } else{
			$harga = mysql_query("select * from harga where kd_harga='".$_POST['harga']."'") or die (mysql_error());
			$harga_op = mysql_fetch_array($harga_op);
		?>
        <option value="<?php echo $_POST['kd_harga'];?>"><?php echo $harga_op['wilayah'];?></option>
        <?php } ?>
        
        <!-- nama HARGA / WILAYAH -->
        <?php
		$harga = mysql_query("select * from harga order by wilayah asc") or die (mysql_error());
		while($data_harga = mysql_fetch_array($harga)){
		?>
        <option value="<?php echo $data_harga[2]; ?>"><?php echo $data_harga['wilayah'];?></option>
        <?php } ?>
        
        </select>
    	<span class="error"><?php echo $error['harga'];?></span>
    	</td>
    </tr>
	<tr>
        <td></td>
        <td>
        <span><h5 id='nominal'></h5></span>

        <span class="error"><?php echo isset($error['uang_supir']) ? $error['uang_supir'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
        <input selected="selected" type="radio" name="status" value="proses"/> proses
        <input type="radio" name="status" value="lunas"/> lunas

        <span class="error"><?php echo $error['status'];?></span>
        </td>
    </tr>
    <tr>
        <td>Packing List</td>
        <td>
        <input required="required" type="text" name="packinglist" value="<?php echo (isset($_POST['packinglist'])) ? $_POST['packinglist'] : false;?>"/>

        <span class="error"><?php echo $error['packinglist'];?></span>
        </td>
    </tr>
    <tr>
        <td>DP</td>
        <td>
        <input required="required" type="number" name="dp" value="<?php echo (isset($_POST['dp'])) ? $_POST['dp'] : false;?>"/>

        <span class="error"><?php echo isset($error['dp']) ? $error['dp'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Member">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>

<script>
// CONVERT FORMAT NUMBER
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

// MENDAPATKAN SELECT
var harga = document.getElementById('harga');

// EVENT CHANGE
harga.addEventListener('change', function(e){
	var value = harga.options[harga.options.selectedIndex].value;
	//MENAMPILKANYA PADA ELEMENT #NOMINAL
	document.getElementById('nominal').innerHTML = convertToRupiah(value);
}); 
</script>