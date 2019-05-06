
<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('Kota/VFormAddKota'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah kota</a>
        <!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($DataKota))
                {
                    foreach($DataKota as $ReadDS)
                    {
                        ?>

                        <tr>
                            <td><?php echo $ReadDS->nama; ?></td>
                            <td><?php echo $ReadDS->tarif; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('Kota/DataKota/'.$ReadDS->kd_kota.'/view') ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('Kota/DeleteDataKota/'.$ReadDS->kd_kota) ?>"><i class="fa fa-trash"></i> Delete</a>
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

