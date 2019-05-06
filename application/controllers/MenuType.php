<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuType extends CI_Controller {
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
        }else{
            $data['title']  = "Halaman Tipe menu";
            $data['js']     = "/menu_type/VMenuJs";
            $data['css']    = "/menu_type/VMenuCss";
            $data['menu_type'] = M_MenuType::all();
            $data['content']='menu_type/VMenu';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='menu_type/VFormAddMenu';
        $this->load->view('VBackend',$data);
    }

    public function store(){
        $menu = new M_MenuType;
        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('MenuType'));

    }

    public function edit($id){
        $menu = M_MenuType::find($id);
        $data['menu'] = $menu;
        $data['title']  = "Halaman Tambah Tipe menu";
        $data['content']='menu_type/VFormUpdateMenu';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu = M_MenuType::find($id);
        $menu->name = $request['name'];
        $menu->status = $request['status'];
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('MenuType'));
    }

    public function destroy($id){
        $menu = M_MenuType::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('MenuType'));
    }
}