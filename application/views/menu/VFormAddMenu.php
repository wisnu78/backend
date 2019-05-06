
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Menu/store'); ?>" method="post">
            <div class="form-group">
                <label>Kategori Barang</label>
                <select name="type_menu_id" class="form-control kategori" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($tipe_menu as $kt) {?>
                        <option value="<?=$kt->id?>"><?=$kt->name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama menu</label>
                <input type="text" name="name"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status</label> <br>
                <input type="radio" value="on" name="status" > On
                <input type="radio" value="off" name="status"  > Off
            </div>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>