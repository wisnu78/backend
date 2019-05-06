<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Menu/index/'.$menu->id.'/update'); ?>" method="post">
            <div class="form-group">
                <label>Tipe Menu</label>
                <select name="type_menu_id" class="form-control kategori" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($tipe_menu as $kt) {?>
                        <?php if($kt->id == $menu->type_menu_id){ ?>
                            <option selected value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } else { ?>
                            <option value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php }?>

                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama menu</label>
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