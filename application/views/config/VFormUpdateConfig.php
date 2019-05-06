
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="<?php echo site_url('Config/index/1/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Intagram</label>
                <input type="text" name="instagram" value="<?=isset($form->instagram) ? $form->instagram : null ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" value="<?=isset($form->facebook) ? $form->facebook : null ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Twitter</label>
                <input type="text" name="twitter" value="<?=isset($form->twitter) ? $form->twitter : null ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Pinit</label>
                <input type="text" name="pinit" value="<?=isset($form->pinit) ? $form->pinit : null ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Google +</label>
                <input type="text" name="google" value="<?=isset($form->google) ? $form->google : null ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" value="<?=isset($form->email) ? $form->email : null ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea id="detail" name="detail" class="form-control">
                    <?=isset($form->detail) ? $form->detail : null ?>
                </textarea>
            </div>
            <div class="form-group">
                <label>Logo</label> <br>
                <input type="file" name="gambar" id="file-7" class="inputfile inputfile-6 hidden imgUser" />
                <label for="file-7">
                    <span></span>
                    <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                <img id="show_image" src="<?=base_url('upload/'.$file->gambar->name)?>" class="img-responsive" style="width: 400px !important;height: auto" />
            </div>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
    <!-- /.box-body -->
</div>