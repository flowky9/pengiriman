<table width="100%" border="0">
<tr>
	<td class="judul-halaman"><h2>Detail Produk</h2></td>
</tr>
<tr>
	<td>
    
    <?php
	
	$id = $_GET['id'];
	
	$last = $_GET['last'];
	$hal = $_GET['hal'];
	$cari = $_GET['cari'];
	$kategori = $_GET['kategori'];
	
	$produk = mysql_query("select * from produk where kd_produk='$id'") or die (mysql_error());
	$data_produk = mysql_fetch_array($produk);
	
	?>
    
    <br/>
    <br/>
    <table class="detail" width="534" border="0">
    <tr>
    	<td class="gambar_detail" width="250" rowspan="5">
        <img src="images/produk/<?php echo $data_produk['gambar'];?>" width="250" height="250">
        </td>
    	<td width="284"><h2><?php echo $data_produk['nm_produk'];?></h2></td>
    </tr>
    <tr>
    	<td><?php echo $data_produk['deskripsi'];?></td>
    </tr>
    <tr>
    	<td><b>Rp. <?php echo format_angka($data_produk['harga']);?></b></td>
    </tr>
    <tr>
    	<td>Stok : <?php echo $data_produk['stok'];?></td>
    </tr>
    <tr>
    	<td class="btn-set">
        <a class="btn-kiri" href="?module=Proses_Beli&kd_produk=<?php echo $data_produk['kd_produk'];?>">Beli</a>
        <a class="btn-kanan" href="?module=<?php echo $last;?>&hal=<?php echo $hal;?>&cari=<?php echo $cari;?>&kategori=<?php echo $kategori;?>">Kembali</a>
        </td>
    </tr>
    </table>
    
    </td>
</tr>
</table>