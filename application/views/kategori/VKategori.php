
<div class="box">
    <div class="box-header">
        <!--        <h3 class="box-title">Data Table With Full Features</h3>-->
        <a href="<?php echo site_url('Kategori/VFormAddKategori'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah kategori</a>
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
               if(!empty($DataKategori))
               {
                   foreach($DataKategori as $ReadDS)
                   {
                       ?>

                       <tr>
                           <td><?php echo $ReadDS->nama; ?></td>
                           <td><?php if($ReadDS->status == 1){ echo "On"; }else{ echo "Off"; }; ?></td>
                           <td>
                               <a class="btn btn-primary btn-sm" href="<?php echo site_url('Kategori/DataKategori/'.$ReadDS->kd_kategori.'/view') ?>"><i class="fa fa-pencil"></i> Edit</a>
                               <a href="<?php echo site_url('Kategori/DeleteDataKategori/'.$ReadDS->kd_kategori) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
