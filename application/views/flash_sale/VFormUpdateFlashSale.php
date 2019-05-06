<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('FlashSale/index/'.$menu->id.'/update'); ?>" method="post">

            <div class="form-group">
                <label for="">Tipe menu</label>
                <input type="text" name="name" value="<?=$menu->name?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Diskon (%)</label>
                <input type="text" name="discount" value="<?=$menu->discount?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Start</label>
                <input type="date" name="start_time" value="<?=$menu->start_time?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">End</label>
                <input type="date" name="end_time" value="<?=$menu->end_time?>"  class="form-control">
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