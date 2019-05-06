<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Kota/UpdateDataKota'); ?>" method="post">
            <div class="form-group hidden">
                <label for="">Kode Kota</label>
                <input type="text" value="<?=$detail['kd_kota']?>" name="kd_kota" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Kota</label>
                <input type="text" name="nama" value="<?=$detail['nama']?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tarif</label>
                <input type="text" name="tarif" value="<?=$detail['tarif']?>" class="form-control">
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