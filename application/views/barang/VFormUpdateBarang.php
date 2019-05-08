<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Barang/index/'.$menu_edit->id.'/update'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="name" value="<?=$menu_edit->name?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama brand</label>
                <input type="text" value="<?=$menu_edit->brand?>" name="brand"  class="form-control">
            </div>
            <div class="form-group">
                <label>Kategori Menu Barang</label>
                <select name="menu_id" class="form-control menu_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($menu as $kt) {?>
                        <?php
                            if($kt->id == $menu_edit->menu_id){


                        ?>
                            <option selected="true" value="<?=$kt->id?>"><?=$kt->name?></option>
                         <?php } else {?>
                                <option value="<?=$kt->id?>"><?=$kt->name?></option>
                            <?php } ?>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Kategori Sub Menu Barang</label>
                <select name="sub_menu_id" class="form-control sub_menu_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($sub_menu as $kt) {?>
                        <?php
                        if($kt->id == $menu_edit->sub_menu_id){
                            ?>
                            <option selected="true" value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } else {?>
                            <option value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } ?>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Pomo</label>
                <select name="promo_id" class="form-control promo_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($promo as $kt) {?>
                        <?php
                        if($kt->id == $menu_edit->promo_id){
                            ?>
                            <option selected="true" value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } else {?>
                            <option value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } ?>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Flash Sale</label>
                <select name="flash_sale_id" class="form-control flash_sale_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($flash_sale as $kt) {?>
                        <?php
                        if($kt->id == $menu_edit->flash_sale_id){
                            ?>
                            <option selected="true" value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } else {?>
                            <option value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } ?>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Ketersediaan Barang</label>
                <select name="availability" class="form-control availability" style="width: 100% !important;">
                    <option></option>
                    <option <?=$menu_edit->availability == 1 ? 'selected="true"':null ?> value="1">Tersedia</option>
                    <option <?=$menu_edit->availability == 2 ? 'selected="true"':null ?> value="2">Sudah Habis</option>
                </select>
            </div>
            <div class="form-group">
                <label>Stok Barang</label>
                <input type="number" value="<?=$menu_edit->stock?>" name="stock" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" value="<?=$menu_edit->price?>" name="harga"  class="form-control harga">
            </div>
            <div class="form-group">
                <label for="">Deskripsi Barang</label>
                <textarea name="description" id="description" class="form-control">
                    <?=$menu_edit->description?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Detail Barang</label>
                <textarea name="detail" id="detail" class="form-control">
                    <?=$menu_edit->detail?>
                </textarea>
            </div>

            <div class="form-group">
                <label>Pilih Warna</label>
                <?php
                    $d_colors = $menu_edit->colors != null ? json_decode($menu_edit->colors,true) : [];
                ?>
                <select name="warna[]" class="form-control warna" multiple="true" style="width: 100% !important;">
                    <option></option>

                    <?php foreach ($colors as $key=>$kt) {?>
                        <?php

                        if($d_colors[$key][$kt->code]){
                            ?>
                            <option selected="true" style="background: red !important;" value="<?=$kt->code?>"><span style="background: red !important;"><?=$kt->name?></span></option>

                        <?php } else {?>
                            <option style="background: red !important;" value="<?=$kt->code?>"><span style="background: red !important;"><?=$kt->name?></span></option>
                        <?php } ?>
                    <?php }?>

                </select>
            </div>
            <div class="form-group">
                <label>Form Detail</label>
                <select name="form_detail" class="form-control form_detail" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($form_detail as $kt) {?>
                        <?php
                        if($kt->id == $menu_edit->form_detail){
                            ?>
                            <option selected="true" value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } else {?>
                            <option value="<?=$kt->id?>"><?=$kt->name?></option>
                        <?php } ?>
                    <?php }?>
                </select>
            </div>
            <div id="form-render"></div>
            <div class="form-group">
                <label for="">Status</label> <br>
                <input type="radio" value="on" name="status" > On
                <input type="radio" value="off" name="status"  > Off
            </div>
            <br>
            <input type="file" name="userfile[]" multiple> <br>
            <div class="row">
                <?php
                    $d_img = $menu_edit->images != null ? json_decode($menu_edit->images) : [];
                    foreach ($d_img as $img){
                ?>
                        <div class="col-md-3">
                            <img style="width: 100px !important;height: 100px !important;" src="<?=base_url('/upload/'.$img)?>" alt="Tidak ada">
                        </div>
                <?php }?>
            </div>
            <br>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>