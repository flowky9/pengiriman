<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Ubah Data Admin</h2></td>
</tr>
<tr>
	<td>
    
    <br/>
    
    <?php
	
	$id = $_GET['id'];
	
	if(isset($_SESSION['error'])){
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	$query = mysql_query("select * from admin where kd_admin='$id'") or die (mysql_error());
	$array = mysql_fetch_array($query);
	
	?>
    
    <form action="?module=Update_Admin&id=<?php echo $id;?>" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="15%">Username</td>
    	<td width="85%">
    	<input type="text" name="user" value="<?php echo $array['username'];?>"/>
    	<span class="error"><?php echo $error['user'];?></span>
    	</td>
    </tr>
    <tr>
    	<td>Password Baru</td>
    	<td>
    	<input type="password" name="pass" />
        <?php
			if(empty($error['pass'])){
		?>
        	<span class="error">(Jika ingin mengganti password)</span>
        <?php } else {?>
        	<span class="error"><?php echo $error['pass'];?></span>
        <?php } ?>
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Ubah">
        <a class="button small grey fontB" href="?module=Data_Admin">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>