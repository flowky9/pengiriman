<?php

$id = $_GET['id'];

if($_GET['execute'] == "admin"){
	mysql_query("delete from admin where kd_admin='$id'") or die (mysql_error());
}
elseif($_GET['execute'] == "armada"){
	mysql_query("delete from armada where kd_armada='$id'") or die (mysql_error());
}
elseif($_GET['execute'] == "propinsi"){
	mysql_query("delete from harga where kd_harga='$id'") or die (mysql_error());
}
elseif($_GET['execute'] == "supir"){
	mysql_query("delete from driver where kd_driver='$id'") or die (mysql_error());
}
elseif($_GET['execute'] == "produk"){
	mysql_query("delete from produk where kd_produk='$id'") or die (mysql_error());
}
elseif($_GET['execute'] == "transaksi"){
	mysql_query("delete from transaksi where no_transaksi='$id'") or die (mysql_error());
	mysql_query("delete from transaksi_detail where no_transaksi='$id'") or die (mysql_error());
}

echo "<script>history.go(-1);</script>";

?>