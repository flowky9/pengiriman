<?php

if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

$no_transaksi = $_GET['no_transaksi'];

if(isset($_SESSION['post'])){
	$_POST = $_SESSION['post'];
	$error = $_SESSION['error'];
	unset($_SESSION['post']);
	unset($_SESSION['error']);
}

?>

<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Konfirmasi</h2></td>
</tr>
<tr>
	<td class="content-halaman">
    <br/>
    
    <form action="?module=Valid_Konfirmasi&no_transaksi=<?php echo $no_transaksi;?>" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="19%">No. Transaksi</td>
    	<td width="81%">
        <input type="text" name="no_trans" value="<?php echo $no_transaksi;?>" readonly />
    	</td>
    </tr>
    <tr>
    	<td>Atas Nama</td>
    	<td>
        <input type="text" name="nama" value="<?php echo $_POST['nama'];?>" />
        <span class="error"><?php echo $error['nama'];?></span>
    	</td>
    </tr>
    <tr>
    	<td>No. Rekening</td>
    	<td>
        <input type="text" name="no_rek" value="<?php echo $_POST['no_rek'];?>" />
        <span class="error"><?php echo $error['no_rek'];?></span>
    	</td>
    </tr>
    <tr>
    	<td>Jumlah Transfer</td>
    	<td>
        <input type="text" name="jumlah" value="<?php echo $_POST['jumlah'];?>" />
        <span class="error"><?php echo $error['jumlah'];?></span>
    	</td>
    </tr>
    <tr>
    	<td>Keterangan</td>
    	<td>
        <textarea name="keterangan"><?php echo $_POST['keterangan'];?></textarea>
        <span class="error"><?php echo $error['keterangan'];?></span>
    	</td>
    </tr>
    <tr>
    	<td></td>
    	<td><input class="button small grey" type="submit" value="Kirim Konfirmasi" /></td>
    </tr>
    </table>
    </form>
    
    <br/>
    </td>
</tr>
</table>