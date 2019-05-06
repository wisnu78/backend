
<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('FlashSale/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Flash Sale</a>
        <!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($flash_sale))
                {
                    foreach($flash_sale as $ReadDS)
                    {
                        ?>

                        <tr>
                            <td><?php echo $ReadDS->name; ?></td>
                            <td><?php echo $ReadDS->status; ?></td>
                            <td><?php echo $ReadDS->start_time; ?></td>
                            <td><?php echo $ReadDS->end_time; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('FlashSale/index/'.$ReadDS->id.'/edit') ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('FlashSale/index/'.$ReadDS->id.'/delete') ?>"><i class="fa fa-trash"></i> Delete</a>
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

