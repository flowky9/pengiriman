<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Tambah Data Admin</h2></td>
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
    
    <form action="?module=Simpan_Admin" method="post">
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="12%">Username</td>
    	<td width="88%">
    	<input type="text" name="username" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : false;?>"/>
    	<span class ="error"><?php echo $error['username'];?></span>
    	</td>
    </tr>
    <tr>
    	<td width =12%>Password</td>
    	<td width=88%>
    	<input type="password" name="password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : false;?>"/>
        <span class ="error"><?php echo $error['password'];?></span>
    	
    	</td>
    </tr>
    <tr>
    	<td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Admin">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>