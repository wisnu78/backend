
<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('Menu/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Menu</a>
        <!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tipe Menu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($menu_type))
                {
                    foreach($menu_type as $ReadDS)
                    {
                        ?>

                        <tr>
                            <td><?php echo $ReadDS->name; ?></td>
                            <td><?php echo $ReadDS->type_menu->name; ?></td>
                            <td><?php echo $ReadDS->status; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('Menu/index/'.$ReadDS->id.'/edit') ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('Menu/index/'.$ReadDS->id.'/delete') ?>"><i class="fa fa-trash"></i> Delete</a>
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

