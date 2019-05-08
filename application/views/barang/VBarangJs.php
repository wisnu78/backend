<!--suppress ALL -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src='https://formbuilder.online/assets/js/form-render.min.js'></script>

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

        if($("#description").length == 1){

            CKEDITOR.replace('description')
        }

        $('.menu_id').select2({
            placeholder:"--Pilih Tipe Menu--"
        });

        $('.form_detail').select2({
            placeholder:"--Pilih Detail--",
            templateResult: formatState
        });

        setTimeout(function(){
            <?php if(isset($menu_edit)){ ?>
            $('.form_detail').val(<?=$menu_edit->form_detail?>); // Select the option with a value of '1'
            $('.form_detail').trigger('change'); // Notify any JS components that the value changed
            <?php }?>
        },1000)



        $('.warna').select2({
            placeholder:"--Pilih Warna--",
            templateResult: formatState
        });
        $('.promo_id').select2({
            placeholder:"--Pilih Promo--"
        });

        $('.flash_sale_id').select2({
            placeholder:"--Pilih Flash sale--"
        });

        $('.availability').select2({
            placeholder:"--Pilih Ketersedian barang--"
        });

        $(".form_detail").on("change",function(e){
            var value = $(this).val();
            $.ajax({
                url:"<?=base_url('index.php/Barang/index/')?>"+$(this).val()+"/get_body",
                type:"GET",
                success:function(data){
                    var parse = JSON.parse(data);
                    console.log(parse.body);
                    formData = parse.body;
                    formRenderOpts = {
                        formData: formData
                    };

                    var renderedForm = $('<div>');
                    renderedForm.formRender(formRenderOpts);

                    var div = document.getElementById('form-render');

                    div.innerHTML += renderedForm.html();

                }
            })
        })

        $(".menu_id").on("change",function(e){
           $(".sub_menu_id").html("");
           $(".sub_menu_id").append("<option></option>");
           var menu_id = $(this).val();
           $.ajax({
               url:"<?=base_url('index.php/Barang/index/')?>"+$(this).val()+"/get_menu",
               type:"GET",
               success:function(data){
                   var a = JSON.parse(data);
                   var listMenu = [];
                   a.forEach(function(value,index){
                       listMenu.push({
                           id:value.id,
                           text:value.name
                       });
                   });

                   $('.sub_menu_id').select2({
                       data:listMenu,
                       placeholder:"--Pilih Sub Menu--"
                   });
               }
           });
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

    function formatState (state) {
        console.log(state);
        if (!state.id) { return state.text; }
        var $state = $(
            '<span ><div style="width: 20px !important;height: 20px;display: inline-block;background:'+state.id+';margin-top: "></div> <span style="margin-bottom: 3px !important;">' + state.text + '</span></span>'
        );
        return $state;
    }


</script>