<?php
# Fungsi untuk membuat kode automatis
function buatKode($table,$prefix,$id){
// membaca kode barang terbesar
include "koneksi.php";
$query = "SELECT max($id) as maxKode FROM $table";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = $prefix;
$newID = $char . sprintf("%03s", $noUrut);

return $newID;
}

function buatKodeInv($table,$id){
// membaca kode barang terbesar
include "koneksi.php";
$query = "SELECT max($id) as maxKode FROM $table";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 0, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'

$newID = sprintf("%03s", $noUrut);

return $newID;
}

// function buatKode($tabel, $inisial){
// 	$struktur	= mysql_query("SELECT * FROM $tabel");
// 	$field		= mysql_field_name($struktur,0);
// 	$panjang	= mysql_field_len($struktur,0);

//  	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
//  	$row	= mysql_fetch_array($qry); 
//  	if ($row[0]=="") {
//  		$angka=0;
// 	}
//  	else {
//  		$angka		= substr($row[0], strlen($inisial));
//  	}
	
//  	$angka++;
//  	$angka	=strval($angka); 
//  	$tmp	="";
//  	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
// 		$tmp=$tmp."0";	
// 	}
//  	return $inisial.$tmp.$angka;
// }

# Fungsi untuk membalik tanggal dari format Indo -> English
function InggrisTgl($tanggal){
	$tgl=substr($tanggal,0,2);
	$bln=substr($tanggal,3,2);
	$thn=substr($tanggal,6,4);
	$awal="$thn-$bln-$tgl";
	return $awal;
}

# Fungsi untuk membalik tanggal dari format English -> Indo
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$awal="$tgl-$bln-$thn";
	return $awal;
}

# Fungsi untuk membuat format rupiah pada angka (uang)
function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}

function tanggal_indonesia($date)
{
    $hari  = array(
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    );
    $bulan = array(
        "Januari",
        "Februari",
        "Mart",
        "April",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    $thn   = substr($date, 0, 4);
    $bln   = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $hr    = date("w", strtotime($date));
    
    $result = $tgl . " " . $bulan[(int) $bln - 1] . ' ' . $thn ;
    return $result;
}

?>