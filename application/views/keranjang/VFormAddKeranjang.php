<form action="<?php echo site_url('Keranjang/AddDataKeranjang'); ?>" method="post">
    user <select name="user_id">
            <option>--Pilih User--</option>
            <?php foreach($user as $keyUser=>$user) { ?>
                <option value="<?php echo $user->kd_user ?>"><?php echo $user->username ?></option>
            <?php } ?>
        </select>     <br>
    Barang <select name="barang_id">
        <option>--Pilih Barang--</option>
        <?php foreach($barang as $keyBarang=>$barang) { ?>
                <option value="<?php echo $barang->kd_barang ?>"><?php echo $barang->nama ?></option>
            <?php } ?>
    </select>
    <br>
    total <input type="text" name="total">
   
    <br>
    <input type="submit" name="simpan" value="Simpan">
</form>