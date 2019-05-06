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
        $data['flash_sale'] = M_FlashSale::where("status","on")->get();
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='barang/VFormAddBarang';
        $this->load->view('VBackend',$data);
    }

    public function store(){
        $menu = new M_Barang;
        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Barang'));

    }

    public function edit($id){
        $menu = M_Barang::find($id);
        $data['menu'] = $menu;
        $data['title']  = "Halaman Tambah Tipe menu";
        $data['content']='barang/VFormUpdateBarang';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu = M_Barang::find($id);
        $menu->name = $request['name'];
        $menu->status = $request['status'];
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('Barang'));
    }

    public function destroy($id){
        $menu = M_Barang::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Barang'));
    }
}