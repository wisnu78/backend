<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Banner/AddDataBanner'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Nama banner</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Barang</label>
                <select name="barang_id" id="" class="form-control barang_id">
                    <option></option>
                    <?php foreach ($barang as $b){ ?>
                        <option value="<?=$b->id?>"><?=$b->name?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label></label>
                <input type="file" name="gambar" id="file-7" class="inputfile inputfile-6 hidden imgUser" />
                <label for="file-7">
                    <span></span>
                    <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                <img id="show_image" src="" class="img-responsive" style="width: 400px !important;height: auto" />
            </div>

            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>