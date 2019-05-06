
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Promo/store'); ?>" method="post">
            <div class="form-group">
                <label for="">Nama Promo</label>
                <input type="text" name="name"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Diskon (%)</label>
                <input type="text" name="discount"  class="form-control">
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