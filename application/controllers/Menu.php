<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
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
            $data['title']  = "Halaman menu";
            $data['js']     = "/menu/VMenuJs";
            $data['css']    = "/menu/VMenuCss";
            $data['menu_type'] = M_Menu::all();
            $data['content']='menu/VMenu';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='menu/VFormAddMenu';
        $data['js'] = "menu/VMenuJs";
        $data['css'] = "menu/VMenuCss";
        $data['tipe_menu'] = M_MenuType::where("status",'on')->get();
        $this->load->view('VBackend',$data);
    }

    public function store(){

        $menu = new M_Menu;
        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->type_menu_id = $this->input->post("type_menu_id");
        $menu->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Menu'));

    }

    public function edit($id){
        $menu = M_Menu::find($id);
        $data['js']         = "menu/VMenuJs";
        $data['css']        = "menu/VMenuCss";
        $data['menu']       = $menu;
        $data['title']      = "Halaman Edit menu";
        $data['content']    = 'menu/VFormUpdateMenu';
        $data['tipe_menu']  = M_MenuType::where('status','on')->get();

        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu = M_Menu::find($id);

        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->type_menu_id = $this->input->post("type_menu_id");
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('Menu'));
    }

    public function destroy($id){
        $menu = M_Menu::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Menu'));
    }
}