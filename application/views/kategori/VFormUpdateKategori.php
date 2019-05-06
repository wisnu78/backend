<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Kategori/UpdateDataKategori'); ?>" method="post">
            <input type="hidden" value="<?php echo $detail['kd_kategori'] ?>" name="kd_kategori">
            <div class="form-group">
                <label for="">Nama ketegori</label>
                <input type="text" name="nama" class="form-control" value="<?=$detail['nama']?>">
            </div>
            <div class="form-group">
                <label for="">Status</label>

                &nbsp;&nbsp;&nbsp;<input type="radio" value="1" <?php if($detail['status'] == 1) {?> checked="true"  <?php }?> name="status">On
                &nbsp;&nbsp;&nbsp;<input type="radio" value="0" <?php if($detail['status'] == 0) {?> checked="true"  <?php }?> name="status">Off
            </div>
            <br>
            <!--            <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">-->
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>