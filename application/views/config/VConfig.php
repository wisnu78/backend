
<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('SubMenu/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Sub Menu</a>
        <!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($sub_menu))
                {
                    foreach($sub_menu as $ReadDS)
                    {
                        ?>

                        <tr>
                            <td><?php echo $ReadDS->menu->type_menu->name; ?></td>
                            <td><?php echo $ReadDS->menu->name; ?></td>
                            <td><?php echo $ReadDS->name; ?></td>
                            <td><?php echo $ReadDS->status; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('SubMenu/index/'.$ReadDS->id.'/edit') ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('SubMenu/index/'.$ReadDS->id.'/delete') ?>"><i class="fa fa-trash"></i> Delete</a>
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

