
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form method="POST" action="<?php echo site_url('Welcome/UpdateDataBarang'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="kd_barang" value="<?=$detail['kd_barang']?>">
            <div class="form-group">
                <label>Kategori Barang</label>
                <select class="form-control kategori" style="width: 100% !important;">
                    <option></option>
                    <?php foreach ($kategori as $kt) {?>
                        <?php if($kt->kd_kategori == $detail['kategori_id']){ ?>
                            <option selected value="<?=$kt->kd_kategori?>"><?=$kt->nama?></option>
                         <?php } else { ?>
                            <option value="<?=$kt->kd_kategori?>"><?=$kt->nama?></option>
                         <?php }?>

                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama barang</label>
                <input class="form-control" name="nama" type="text" value="<?=$detail['nama']?>">
            </div>
            <div class="form-group">
                <label>Harga barang</label>
                <input class="form-control harga" name="harga" type="text" value="<?=$detail['harga']?>">
            </div>
            <div class="form-group">
                <label>Detail</label>
                <textarea id="detail" name="detail" class="form-control">
                    <?=$detail['detail']?>
                </textarea>
            </div>
            <div class="form-group">
                <label></label>
                <input type="file" name="gambar" id="file-7" class="inputfile inputfile-6 hidden imgUser" />
                <label for="file-7">
                    <span></span>
                    <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                <img id="show_image" src="<?=base_url('upload/'.$detail['gambar'])?>" class="img-responsive" style="width: 400px !important;height: auto" />
            </div>
            <button type="submit"  class="pull-right btn btn-primary btn-sm btn-submit"><i class="fa fa-save"></i> &nbsp;Simpan</button>
        </form>
    </div>
    <!-- /.box-body -->
</div>