<table width="100%" border="0">
<tr>
    <td class="judul-halaman"><h2>Tambah Data Member</h2></td>
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
    
    <form action="?module=Simpan_Member" method="post">
    <table class="form" width="100%" border="0">
    <tr>
        <td width="12%">Nama Perusahaan</td>
        <td width="88%">
        <input type="text" name="nm_perusahaan" value="<?php echo (isset($_POST['nm_perusahaan'])) ? $_POST['nm_perusahaan'] : false;?>"/>
        <span class ="error"><?php echo isset($error['nm_perusahaan']) ? $error['nm_perusahaan'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td>Nama Customer</td>
        <td>
        <input type="text" name="nm_customer" value="<?php echo (isset($_POST['nm_customer'])) ? $_POST['nm_customer'] : false;?>"/>

        <span class="error"><?php echo $error['nm_customer'];?></span>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
        <input type="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : false;?>"/>

        <span class="error"><?php echo isset($error['email']) ? $error['email'] : false;?></span>
        </td>
    </tr>
    <tr>
        <td>No Telp</td>
        <td>
        <input type="text" name="no_hp" value="<?php echo (isset($_POST['no_hp'])) ? $_POST['no_hp'] : false;?>"/>

        <span class="error"><?php echo isset($error['no_hp']) ? $error['no_hp'] : false;?></span>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
        <input class="button small grey fontB" type="submit" value="Simpan">
        <a class="button small grey fontB" href="?module=Data_Member">Kembali</a>
        </td>
    </tr>
    </table>
    </form>
    
    </td>
</tr>
</table>