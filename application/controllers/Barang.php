<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('MSudi');
    }
    public function index(){
        $param = strtolower($this->uri->segment(4));
        if ($param == "edit"){
            $id = $this->uri->segment(3);
            $this->edit($id);
        }elseif ($param == "update"){
            $this->update($this->uri->segment(3),$this->input->post());
        }elseif($param == 'delete'){
            $id = $this->uri->segment(3);
            $this->destroy($id);
        }elseif($param == 'get_menu'){
            $id = $this->uri->segment(3);
            $menu = M_SubMenu::where("menu_id",$id)->get();
            echo json_encode($menu);
        }elseif($param == 'get_body'){
            $id = $this->uri->segment(3);
            $menu = M_ManageForm::find($id)->first();
            echo json_encode($menu);
        }else{

            $data['title']  = "Halaman Daftar Barang";
            $data['js']     = "/barang/VBarangJs";
            $data['css']    = "/barang/VBarangCss";
            $data['barang'] = M_Barang::all();
            $data['content']='barang/VBarang';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['js']     = "/barang/VBarangJs";
        $data['css']    = "/barang/VBarangCss";
        $data['menu'] = M_Menu::where("status","on")->get();
        $data['promo'] = M_Promo::where("status","on")->get();
        $data['form_detail'] = M_ManageForm::all();
        $data['colors'] = M_Colour::all();
        $data['flash_sale'] = M_FlashSale::where("status","on")->get();
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='barang/VFormAddBarang';

        $this->load->view('VBackend',$data);
    }

    public function store(){
        $config = array();
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = '*';
        $config['overwrite']     = FALSE;

        $this->load->library('upload');

        $length = count($_FILES['userfile']['name']);





        $imagesFile = [];
        if ($length > 0){
            $files = $_FILES;
            for($i=0; $i< $length; $i++)
            {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];

                $this->upload->initialize($config);
                $this->upload->do_upload();
                array_push($imagesFile,$files['userfile']['name'][$i]);
            }
        }



        $post = $this->input->post();
        $all_post = $this->input->post();

        unset($post['name'],$post['brand'],$post['menu_id'],$post['sub_menu_id'],$post['promo_id'],$post['flash_sale_id'],$post['availability'],$post['description'],$post['detail'],$post['warna'],$post['form_detail'],$post['status'],$post['simpan'],$post['stock']);

        $barang = new M_Barang;
        $barang->name           = $all_post['name'];
        $barang->brand          = $all_post['brand'];
        $barang->menu_id        = $all_post['menu_id'];
        $barang->sub_menu_id    = $all_post['sub_menu_id'];
        $barang->promo_id       = $all_post['promo_id'];
        $barang->flash_sale_id  = $all_post['flash_sale_id'];
        $barang->availability   = $all_post['availability'];
        $barang->description    = $all_post['description'];
        $barang->detail         = $all_post['detail'];
        $barang->form_detail    = $all_post['form_detail'];
        $barang->status         = $all_post['status'];
        $barang->stock          = $all_post['stock'];
        $barang->price          = $all_post['harga'];
        $barang->setting        = json_encode($post);
        $barang->images         = json_encode($imagesFile);
        $barang->colors         = json_encode($all_post['warna']);
        $barang->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Barang'));


    }


    public function edit($id){
        $menu_edit = M_Barang::find($id);

        $data['menu_edit'] = $menu_edit;
        $data['title']  = "Halaman Tambah Tipe menu";
        $data['content']='barang/VFormUpdateBarang';
        $data['menu'] = M_Menu::where("status","on")->get();
        $data['promo'] = M_Promo::where("status","on")->get();
        $data['form_detail'] = M_ManageForm::all();
        $data['colors'] = M_Colour::all();
        $data['sub_menu'] = M_SubMenu::where("menu_id",$menu_edit->menu_id)->get();
        $data['flash_sale'] = M_FlashSale::where("status","on")->get();
        $data['js']     = "/barang/VBarangJs";
        $data['css']    = "/barang/VBarangCss";
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $config = array();
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = '*';
        $config['overwrite']     = FALSE;

        $this->load->library('upload');

        $length = count($_FILES['userfile']['name']);





        $imagesFile = [];
        if ($length > 0){
            $files = $_FILES;
            for($i=0; $i< $length; $i++)
            {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];

                $this->upload->initialize($config);
                $this->upload->do_upload();
                array_push($imagesFile,$files['userfile']['name'][$i]);
            }
        }



        $post = $this->input->post();
        $all_post = $this->input->post();

        unset($post['name'],$post['brand'],$post['menu_id'],$post['sub_menu_id'],$post['promo_id'],$post['flash_sale_id'],$post['availability'],$post['description'],$post['detail'],$post['warna'],$post['form_detail'],$post['status'],$post['simpan'],$post['stock']);

        $barang =  M_Barang::find($id);
        $barang->name           = $all_post['name'];
        $barang->brand          = $all_post['brand'];
        $barang->menu_id        = $all_post['menu_id'];
        $barang->sub_menu_id    = $all_post['sub_menu_id'];
        $barang->promo_id       = $all_post['promo_id'];
        $barang->flash_sale_id  = $all_post['flash_sale_id'];
        $barang->availability   = $all_post['availability'];
        $barang->description    = $all_post['description'];
        $barang->detail         = $all_post['detail'];
        $barang->form_detail    = $all_post['form_detail'];
        $barang->status         = $all_post['status'];
        $barang->stock          = $all_post['stock'];
        $barang->price          = $all_post['harga'];
        $barang->setting        = json_encode($post);
        $barang->images         = json_encode($imagesFile);
        $barang->colors         = json_encode($all_post['warna']);
        $barang->update();

        $this->session->set_flashdata("message","Data berhasil di update");
        redirect(site_url('Barang'));
    }

    public function destroy($id){
        $menu = M_Barang::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Barang'));
    }
}