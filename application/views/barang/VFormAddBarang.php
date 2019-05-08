
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Barang/store'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="name"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama brand</label>
                <input type="text" name="brand"  class="form-control">
            </div>
            <div class="form-group">
                <label>Kategori Menu Barang</label>
                <select name="menu_id" class="form-control menu_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($menu as $kt) {?>
                        <option value="<?=$kt->id?>"><?=$kt->name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Kategori Sub Menu Barang</label>
                <select name="sub_menu_id" class="form-control sub_menu_id" style="width: 100% !important;">
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <label>Pomo</label>
                <select name="promo_id" class="form-control promo_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($promo as $kt) {?>
                        <option value="<?=$kt->id?>"><?=$kt->name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Flash Sale</label>
                <select name="flash_sale_id" class="form-control flash_sale_id" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($flash_sale as $kt) {?>
                        <option value="<?=$kt->id?>"><?=$kt->name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Ketersediaan Barang</label>
                <select name="availability" class="form-control availability" style="width: 100% !important;">
                    <option></option>
                    <option value="1">Tersedia</option>
                    <option value="2">Sudah Habis</option>
                </select>
            </div>
            <div class="form-group">
                <label>Stok Barang</label>
                <input type="number" name="stock" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga"  class="form-control harga">
            </div>
            <div class="form-group">
                <label for="">Deskripsi Barang</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Detail Barang</label>
                <textarea name="detail" id="detail" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Pilih Warna</label>
                <select name="warna[]" class="form-control warna" multiple="true" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($colors as $kt) {?>
                        <option style="background: red !important;" value="<?=$kt->code?>"><span style="background: red !important;"><?=$kt->name?></span></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Form Detail</label>
                <select name="form_detail" class="form-control form_detail" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($form_detail as $kt) {?>
                        <option value="<?=$kt->id?>"><?=$kt->name?></option>
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
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>