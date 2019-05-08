
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('ManageForm/index/'.$menu->id.'/update'); ?>" method="post">
            <div class="form-group">
                <label>Tipe Menu</label>
                <input type="text" value="<?=$menu->name?>" name="nama_form" class="form-control">
            </div>
            <div id="fb-editor"></div>
            <textarea name="form" class="hidden" id="form"></textarea>

            <button type="submit" id="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>