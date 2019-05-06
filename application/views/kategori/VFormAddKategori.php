<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Kategori/AddDataKategori'); ?>" method="post">
            <div class="form-group">
                <label for="">Kode kategori</label>
                <input type="text" name="kd_kategori" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama ketegori</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status</label>

                &nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="status">On
                &nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="status">Off
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