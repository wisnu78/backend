<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('MenuType/index/'.$menu->id.'/update'); ?>" method="post">

            <div class="form-group">
                <label for="">Tipe menu</label>
                <input type="text" name="name" value="<?=$menu->name?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status</label> <br>
                <input type="radio"  value="on" <?= $menu->status == 'on' ?  'checked':false ?> name="status" > On
                <input type="radio" value="off" <?= $menu->status == 'off' ?  'checked':false ?>  name="status"  > Off
            </div>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>