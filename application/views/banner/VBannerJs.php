<script src="<?=base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.mask.js')?>"></script>
<script src="<?=base_url('assets/notify/pnotify.custom.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/ckeditor/ckeditor.js')?>"></script>
<script src="<?=base_url('assets/upload/js/custom-file-input.js')?>"></script>

<script>
    $(function(){
        $(".imgUser").change(function() {
            readURL(this);
        });

        if($("#detail").length == 1){

            CKEDITOR.replace('detail')
        }

        $('.barang_id').select2({
            placeholder:"--Pilih Barang--"
        });

        $('#barang').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
        $( '.harga' ).mask('000.000.000', {reverse: true});
        $('.btn-submit').on("click",function(e){
            $(".harga").unmask();
        });
        <?php
             $session = $this->session->flashdata("message");
            if(isset($session)>0){
        ?>
            new PNotify({
                title: 'Success!',
                text: "<?php echo $this->session->flashdata("message")?>",
                type: 'success'
            });
        <?php
            }
        ?>
        $(".p-not").on("click",function(){
            new PNotify({
                title: 'Success!',
                text: 'That thing that you were trying to do worked.',
                type: 'success'
            });
        });

    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>