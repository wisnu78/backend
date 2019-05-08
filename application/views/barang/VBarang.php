
<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('Barang/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</a>
        <!--        <button class="p-not">Klik</button>-->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="barang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($barang))
                {
                    foreach($barang as $ReadDS)
                    {
                        $image = $ReadDS->images != null ? json_decode($ReadDS->images,true):['null'];
                        ?>

                        <tr>
                            <td><img src="<?php echo isset($image) ? base_url('/upload/'.$image[0]):['null'];  ?>" style="width: 50px !important; height: 50px !important;" alt="Gambar tidak ada"></td>
                            <td><?php echo $ReadDS->name; ?></td>
                            <td><?php echo number_format( $ReadDS->price); ?></td>
                            <td><?php echo $ReadDS->status; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('Barang/index/'.$ReadDS->id.'/edit') ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('Barang/index/'.$ReadDS->id.'/delete') ?>"><i class="fa fa-trash"></i> Delete</a>
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

