<form action="<?php echo site_url('Keranjang/UpdateDataKeranjang'); ?>" method="post">
<input type="hidden" name="kd_keranjang" value="<?php echo $detail['kd_keranjang'] ?>">
user <select name="user_id">
            <option>--Pilih User--</option>
            <?php foreach($user as $keyUser=>$user) { ?>
                <?php if($user->kd_user == $detail['user_id']) {?>
                    <option selected="true" value="<?php echo $user->kd_user ?>"><?php echo $user->username ?></option>
                <?php }else{ ?>
                    <option value="<?php echo $user->kd_user ?>"><?php echo $user->username ?></option>
                <?php } ?>
                
            <?php } ?>
        </select>     <br>
    Barang <select name="barang_id">
        <option>--Pilih Barang--</option>
        <?php foreach($barang as $keyBarang=>$barang) { ?>
                <?php if($barang->kd_barang == $detail['barang_id']) {?>
                    <option value="<?php echo $barang->kd_barang ?>" selected="true"><?php echo $barang->nama ?></option>
                <?php }else{ ?>
                    <option value="<?php echo $barang->kd_barang ?>"><?php echo $barang->nama ?></option>
                <?php } ?>
                
            <?php } ?>
    </select>
    <br>
    total <input type="text" name="total" value="<?php echo $detail['total'] ?>">
   
    <br>
    <input type="submit" name="simpan" value="Simpan">
</form>