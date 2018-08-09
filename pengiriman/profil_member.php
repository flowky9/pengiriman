<?php

if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

$member = mysql_query("select * from member where kd_member='".$_SESSION['kd_member_log']."'") or die (mysql_error());
$data_member = mysql_fetch_array($member);

?>

<form action="?module=Update_Member&kd_member=<?php echo $data_member['kd_member'];?>" method="post">
<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Profil Member</h2></td>
</tr>
<tr>
	<td class="content-halaman">
    <br />
    <table class="form" width="100%" border="0">
    <tr>
    	<td width="17%">Nama Lengkap</td>
        <td colspan="2">
        <input type="text" name="nama" value="<?php echo $data_member['nm_member'];?>"/>
        <span class="error"><?php echo $error['nama'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">Email</td>
        <td colspan="2">
        <input type="email" name="email" value="<?php echo $data_member['email'];?>"/>
        <span class="error"><?php echo $error['email'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">No. Telepon</td>
        <td colspan="2">
        <input type="text" name="telepon" value="<?php echo $data_member['no_tlp'];?>"/>
        <span class="error"><?php echo $error['telepon'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">Alamat</td>
        <td colspan="2">
        <textarea name="alamat"><?php echo $data_member['alamat'];?></textarea>
        <span class="error"><?php echo $error['alamat'];?></span>
        </td>
    </tr>
    <tr>
    	<td width="17%">Password Baru</td>
        <td width="13%">
        <input type="password" name="password" /></td>
        <td width="70%" style="padding-left:15px;">
        <span class="error" style="display:inline-block; margin-left:0; width:300px;">
          <?php 
		if(empty($error['password'])){
			echo "(Jika ingin mengubah password)";
		}
		else{
			echo $error['password'];
		}
		?>
        </span>
        </td>
    </tr>
    <tr>
    	<td width="17%"></td>
        <td colspan="2"><input class="button small grey" type="submit" value="Ubah" /></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>