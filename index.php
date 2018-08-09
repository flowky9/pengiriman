<?php
<<<<<<< HEAD
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
=======

session_start();

include "config/koneksi.php";
include "library/library.php";
include "library/expired_transaksi.php";
include "library/expired_keranjang.php";

$module = isset($_GET['module']) ? $_GET['module'] : null;
if(empty($_GET['module'])){
	$module = "Beranda";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. Pegasus Global Solusindo || <?php echo $module;?></title>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/slide-to-side.js"></script>

</head>

<body bgcolor="#FFFFFF">

<div class="frame" style="background-color:#FFF;">

<table width="1000" border="0" align="center">
<tr>
	<td class="header" colspan="2"><h1><img src="images/62.png" width= 60 height=60 />PT. Pegasus Global Solusindo</h1>

    </td>
</tr>
<tr>
    <td class="menu" colspan="2">
    <a href="?module=Beranda">Beranda</a>
    <a href="?module=Produk">Profil</a>
    <a href="?module=Panduan">Cara Pemensanan</a>
    <a href="?module=Kontak">Kontak Kami</a>
    </td>
</tr>

<tr>
	<td class="side-menu" width="200" valign="top">
    <table border="0" width="100%" align="left">
    <tr>
    <td class="side-menu-box">
    <h4>Kategori</h4>
    <ul style="list-style-type:circle; list-style-position:inside;">
    <li><a href="?module=Produk&merk=">Semua Kategori</a></li>
    
	<?php
	$kategori = mysql_query("select * from kategori order by nm_kategori asc") or die (mysql_error());
	while($data_kategori = mysql_fetch_array($kategori)){
	?>
    <li><a href="?module=Produk&kategori=<?php echo $data_kategori['kd_kategori'];?>"><?php echo $data_kategori['nm_kategori'];?></a></li>
    <?php } ?>
    
    </ul>
    </td>
    </tr>
    <tr>
    <td class="side-menu-box">
    
    <?php
    if(empty($_SESSION['kd_member_log']) or !isset($_SESSION['kd_member_log'])){
	?>
    <form action="?module=Valid_Login" method="post">
    <h4>Login</h4>
    <ul>
    <li><input type="text" name="email" placeholder="Email" style="width:85%"/></li>
    <li><input type="password" name="password" placeholder="Password" style="width:85%"/></li>
    	<li>
    	<input class="button small grey fontB" type="submit" value="Login" />
    	<a class="link" href="?module=Daftar">Daftar Member</a>
        </li>
    </ul>
    </form>
    <?php } else {?>
    <h4>Data Member</h4>
    <ul style="list-style-type:circle; list-style-position:inside;">
    <li><a href="?module=Profil_Member">Profil Member</a></li>
    <li><a href="?module=Keranjang">Keranjang</a></li>
    <li><a href="?module=Data_Transaksi">Data Transaksi</a></li>
    <li style="list-style-type:none;"><a class="button small grey fontB" href="?module=Logout" onclick="return confirm ('Anda yakin ingin Logout?');">Logout</a></li>
    </ul>
    <?php } ?>
    
    </td>
    </tr>
    <tr>
    <td class="side-menu-box">
    <ul>
    <li><img src="images/bca2.jpg" width="100%" /></li>
    </ul>
    </td>
    </tr>
    </table>
    </td>
    <td class="content" width="770" valign="top"><?php include "module.php";?></td>
</tr>
<tr>
	<td class="footer" align="center" colspan="2">Copyright &copy;2018 PT. Pegasus Global Solusindo</td>
</tr>
</table>

</div>

</body>
</html>
>>>>>>> pengiriman
