<?php

session_start();

if(empty($_SESSION['kd_admin_log']) or !isset($_SESSION['kd_admin_log'])){
	echo "<meta http-equiv='refresh' content='0;url=login_admin.php'>";
}

include "../config/koneksi.php";
include "../library/library.php";

$module = isset ($_GET['module']) ? $_GET['module'] : null;
if(empty($_GET['module'])){
	$module = "Beranda";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator || <?php echo $module;?></title>

<link rel="stylesheet" type="text/css" href="../css/style_admin.css" />
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea", 
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

</head>

<body>

<table width="95%" border="0">
<tr>
	<td colspan="2" class="logo">
    <h2>ADMIN</h2>
    <br/>
    </td>
</tr>
<tr>
	<td colspan="2" class="top-bar" align="right"><a href="?module=Logout" onclick="return confirm('Anda yakin ingin logout?');">&laquo; Logout</a></td>
</tr>
<tr>
	<td class="menu" width="170" valign="top">
    <h4>Menu</h4>
    <ul>
    <li><a href="?module=Beranda">&raquo; Beranda</a></li>
    <li><a href="?module=Data_Admin">&raquo; Data Admin</a></li>
    <li><a href="?module=Data_Member">&raquo; Data Customer</a></li>
    <li><a href="?module=Data_Propinsi">&raquo; Data Harga</a></li>
    <li><a href="?module=Data_Kategori">&raquo; Data Supir</a></li>
    <li><a href="?module=Data_Armada">&raquo; Data Armada</a></li>
    <li><a href="?module=Data_Transaksi">&raquo; Data Pengiriman</a></li>
    <li><a href="?module=Data_Konfirmasi">&raquo; Print Invoice</a></li>
    </ul>
    </td>
	<td class="content" width="800" valign="top"><?php include "module.php";?></td>
</tr>
<tr>
	<td class="footer" colspan="2" align="center">Copyright &copy;2018 PT. Pegasus Global Solusindo</td>
</tr>
</table>

</body>
</html>