<?php

if(!empty($_SESSION['kd_member_log']) or isset($_SESSION['kd_member_log'])){
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

if(isset($_SESSION['post'])){
	$_POST = $_SESSION['post'];
	$error = $_SESSION['error'];
	unset($_SESSION['post']);
	unset($_SESSION['error']);
}

?>

<form action="?module=Valid_Daftar" method="post">
<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Form Pendaftaran</h2></td>
</tr>
<tr>
	<td class="content-halaman">
    <br />
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="17%">Nama Lengkap</td>
        <td colspan="2">
        <input type="text" name="nm_member" value="<?php echo $_POST['nama'];?>"/>
        <span class="error"><?php echo $error['nama'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">Email</td>
        <td colspan="2">
        <input type="text" name="email" value="<?php echo $_POST['email'];?>"/>
        <span class="error"><?php echo $error['email'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">No. Telepon</td>
        <td colspan="2">
        <input type="text" name="telepon" value="<?php echo $_POST['telepon'];?>">
        <span class="error"><?php echo $error['telepon'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">Alamat</td>
        <td colspan="2">
        <textarea name="alamat"><?php echo $_POST['alamat'];?></textarea>
        <span class="error" ><?php echo $error['alamat'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">Password</td>
        <td width="13%">
        <input type="password" name="password" /></td>
        <td width="70%" style="padding-left:15px;">
        <span class="error" style=" display:inline-block; margin-left:0; width:300px;"><?php echo $error['password'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%"></td>
        <td colspan="2"><input class="button small grey" type="submit" value="Simpan" /></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>