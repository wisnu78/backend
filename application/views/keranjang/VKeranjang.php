<table border="1px">
    <tr>
        <td colspan="4">
            <a href="<?php echo site_url('Keranjang/VFormAddKeranjang'); ?>">Add</a>
        </td>
    </tr>
    <tr>
        <th>user_id</th>      
        <th>barang_id</th>
        <th>total</th>
        <th>action</th>
    </tr>
    <?php
    if(!empty($DataKeranjang))
    {
        foreach($DataKeranjang as $ReadDS)
        {
            ?>

            <tr>
                <td><?php echo $ReadDS->user_id; ?></td>
                <td><?php echo $ReadDS->barang_id; ?></td>
                <td><?php echo $ReadDS->total; ?></td>
                <td>
                    <a href="<?php echo site_url('Keranjang/DataKeranjang/'.$ReadDS->kd_keranjang.'/view') ?>">Update</a>
                    <a href="<?php echo site_url('Keranjang/DeleteDataKeranjang/'.$ReadDS->kd_keranjang) ?>">Delete</a>
                </td>
            </tr>

            <?php
        }
    }
    ?>
</table>