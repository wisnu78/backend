<div class="box">
    <div class="box-header">
<!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('Welcome/VFormAddBarang'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah barang</a>
<!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
           <thead>
                <tr>
                    <th>Gambar</th>
                    <th>KD Barang</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Tools</th>
                </tr>
           </thead>
            <tbody>
            <?php
            if(!empty($DataBarang))
            {
            foreach($DataBarang as $ReadDS)
            {
            ?>

            <tr>
                <td><img style="width: 100px !important;height: 100px !important;" src="<?=base_url('upload/'.$ReadDS->gambar)?>" alt=" Tidak ditemukan"></td>
                <td><?php echo $ReadDS->kd_barang; ?></td>
                <td><?php echo $ReadDS->nama; ?></td>
                <td>Rp. <?php echo number_format($ReadDS->harga); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="<?php echo site_url('Welcome/DataBarang/'.$ReadDS->kd_barang.'/view') ?>"><i class="fa fa-pencil"></i>  Edit</a>
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('Welcome/DeleteDataBarang/'.$ReadDS->kd_barang) ?>"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>

            <?php
            }
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<!---->
<!--<table border="1px">-->
<!--    <tr>-->
<!--        <td colspan="4">-->
<!--            <a href="--><?php //echo site_url('Welcome/VFormAddBarang'); ?><!--">Add</a>-->
<!--        </td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th>KD Barang</th>-->
<!--        <th>Nama</th>-->
<!--        <th>Harga</th>-->
<!--        <th>Tools</th>-->
<!--    </tr>-->
<!--    --><?php

//<!--</table>-->