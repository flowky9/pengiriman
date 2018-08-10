<?php

// Halaman //
if(empty($_GET['module']) == "Beranda"){
	include "beranda.php";
}
elseif($_GET['module'] == "Data_Admin"){
	include "data_admin.php";
}
elseif($_GET['module'] == "Data_Member"){
	include "data_member.php";
}
elseif($_GET['module'] == "Data_Propinsi"){
	include "data_propinsi.php";
}
elseif($_GET['module'] == "Data_Supir"){
	include "data_supir.php";
}
elseif($_GET['module'] == "Data_Armada"){
	include "data_armada.php";
}
elseif($_GET['module'] == "Data_Transaksi"){
	include "data_transaksi.php";
}
elseif($_GET['module'] == "Data_Konfirmasi"){
	include "data_konfirmasi.php";
}
elseif($_GET['module'] == "Tambah_Admin"){
	include "tambah_admin.php";
}
elseif($_GET['module'] == "Tambah_Bank"){
	include "tambah_bank.php";
}
elseif($_GET['module'] == "Tambah_Propinsi"){
	include "tambah_propinsi.php";
}
elseif($_GET['module'] == "Tambah_Supir"){
	include "tambah_supir.php";
}
elseif($_GET['module'] == "Tambah_Armada"){
	include "tambah_armada.php";
}
elseif($_GET['module'] == "Tambah_Member"){
	include "tambah_member.php";
}
elseif($_GET['module'] == "Tambah_Pengiriman"){
	include "tambah_pengiriman.php";
}
elseif($_GET['module'] == "Ubah_Admin"){
	include "ubah_admin.php";
}
elseif($_GET['module'] == "Ubah_Bank"){
	include "ubah_bank.php";
}
elseif($_GET['module'] == "Ubah_Propinsi"){
	include "ubah_propinsi.php";
}
elseif($_GET['module'] == "Ubah_Kategori"){
	include "ubah_kategori.php";
}
elseif($_GET['module'] == "Ubah_Supir"){
	include "ubah_supir.php";
}
elseif($_GET['module'] == "Ubah_Armada"){
	include "ubah_armada.php";
}
elseif($_GET['module'] == "Detail_Transaksi"){
	include "detail_transaksi.php";
}
elseif($_GET['module'] == "Laporan_Transaksi"){
	include "laporan_transaksi.php";
}
// ======= //

// Proses //
elseif($_GET['module'] == "Logout"){
	include "logout.php";
}
elseif($_GET['module'] == "Hapus"){
	include "hapus.php";
}
elseif($_GET['module'] == "Simpan_Admin"){
	include "simpan_admin.php";
}
elseif($_GET['module'] == "Simpan_Member"){
include "simpan_member.php";
}
elseif($_GET['module'] == "Simpan_Propinsi"){
	include "simpan_propinsi.php";
}
elseif($_GET['module'] == "Simpan_Supir"){
	include "simpan_supir.php";
}
elseif($_GET['module'] == "Simpan_Produk"){
	include "simpan_produk.php";
}
elseif($_GET['module'] == "Update_Admin"){
	include "update_admin.php";
}
elseif($_GET['module'] == "Update_Armada"){
	include "update_armada.php";
}
elseif($_GET['module'] == "Update_Bank"){
	include "update_bank.php";
}
elseif($_GET['module'] == "Update_Propinsi"){
	include "update_propinsi.php";
}
elseif($_GET['module'] == "Update_Kategori"){
	include "update_kategori.php";
}
elseif($_GET['module'] == "Update_Supir"){
	include "update_supir.php";
}
elseif($_GET['module'] == "Update_Produk"){
	include "update_produk.php";
}
elseif($_GET['module'] == "Proses_Lunas"){
	include "proses_lunas.php";
}
elseif($_GET['module'] == "set_tgl"){
	include "set_tgl.php";
}
// ====== //

else{
	include "beranda.php";
}

?>