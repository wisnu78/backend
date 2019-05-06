<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('Banner/VFormAddBanner'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Banner</a>
        <!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($DataBanner))
                {
                    foreach($DataBanner as $ReadDS)
                    {
                        ?>

                        <tr>
                            <td><?php echo $ReadDS->nama; ?></td>
                            <td>
                                <img src="<?php echo base_url()."/"."upload/".$ReadDS->gambar ?>" alt="" style="width:50px !important;height:50px !important" >
                            </td>
                            <td>
                                <a href="<?php echo site_url('Banner/DataBanner/'.$ReadDS->kd_banner.'/view') ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?php echo site_url('Banner/DeleteDataBanner/'.$ReadDS->kd_banner) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
