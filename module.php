<?php

// Halaman //
if (empty($_GET['module']) == "Beranda"){
	include "beranda.php";
}
elseif($_GET['module'] == "Produk"){
	include "produk.php";
}
elseif($_GET['module'] == "Panduan"){
	include "panduan.php";
}
elseif($_GET['module'] == "Kontak"){
	include "kontak.php";
}
elseif($_GET['module'] == "Detail_Produk"){
	include "detail_produk.php";
}
elseif($_GET['module'] == "Daftar"){
	include "daftar.php";
}
elseif($_GET['module'] == "Keranjang"){
	include "keranjang.php";
}
elseif($_GET['module'] == "Pemesanan"){
	include "pesan.php";
}
elseif($_GET['module'] == "Profil_Member"){
	include "profil_member.php";
}
elseif($_GET['module'] == "Data_Transaksi"){
	include "data_transaksi.php";
}
elseif($_GET['module'] == "Konfirmasi"){
	include "konfirmasi.php";
}
elseif($_GET['module'] == "Detail-Transaksi"){
	include "detail_transaksi.php";
}
// ======= //

// Proses //
elseif($_GET['module'] == "Cari"){
	include "cari.php";
}
elseif($_GET['module'] == "Valid_Daftar"){
	include "valid_daftar.php";
}
elseif($_GET['module'] == "Valid_Login"){
	include "valid_login.php";
}
elseif($_GET['module'] == "Logout"){
	include "logout.php";
}
elseif($_GET['module'] == "Update_Member"){
	include "update_member.php";
}
elseif($_GET['module'] == "Proses_Beli"){
	include "proses_beli.php";
}
elseif($_GET['module'] == "Update"){
	include "update.php";
}
elseif($_GET['module'] == "Hapus"){
	include "hapus.php";
}
elseif($_GET['module'] == "Proses_Pesan"){
	include "proses_pesan.php";
}
elseif($_GET['module'] == "Batal_Transaksi"){
	include "batal_transaksi.php";
}
elseif($_GET['module'] == "Valid_Konfirmasi"){
	include "valid_konfirmasi.php";
}
// ====== //

else{
	include "beranda.php";
}

?>