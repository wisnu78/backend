<!--suppress ALL -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>

<script src="<?=base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.mask.js')?>"></script>
<script src="<?=base_url('assets/notify/pnotify.custom.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/ckeditor/ckeditor.js')?>"></script>
<script src="<?=base_url('assets/upload/js/custom-file-input.js')?>"></script>

<script>
    jQuery(function($) {
//        $(document.getElementById('fb-editor')).formBuilder();

    });
    $(function(){

//        var fbEditor = document.getElementById('build-wrap');
        <?php
            if(isset($menu)){ ?>
            var options = {
                formData: JSON.stringify(<?=$menu->body?>)
            };

        <?php } else { ?>
            var options = {

            };
        <?php }?>

//        var formBuilder = $(fbEditor).formBuilder(options);


        const fbEditor = document.getElementById("fb-editor");
        const formBuilder = $(fbEditor).formBuilder(options);
        $("#submit").on("click",function(e){
           $(document).find(".save-template").trigger('click');
            $("#form").text("");
            $("#form").text(formBuilder.actions.save());
        });


        $(".imgUser").change(function() {
            readURL(this);
        });

        if($("#detail").length == 1){

            CKEDITOR.replace('detail')
        }

        $('.type_menu_id').select2({
            placeholder:"--Pilih Tipe Menu--"
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

        $(".type_menu_id").on('change',function(e){
            $(".menu_id").html("");
            $(".menu_id").append("<option></option>");
            $.ajax({
                url:"<?=base_url('index.php/SubMenu/index/')?>"+$(this).val()+"/get_menu",
                type:'GET',
                success:function(data){

                    var a = JSON.parse(data);
                    var listMenu = [];
                    a.forEach(function(value,index){
                        listMenu.push({
                            id:value.id,
                            text:value.name
                        });
                    });

                    $('.menu_id').select2({
                        data:listMenu,
                        placeholder:"--Pilih Menu--"
                     });
                }
            })
        })

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