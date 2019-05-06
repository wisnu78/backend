<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubMenu extends CI_Controller {
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
        }elseif($param == "get_menu"){
            $id = $this->uri->segment(3);
            $menu = M_Menu::where("type_menu_id",$id)->get();
            echo json_encode($menu);
        }else{
            $data['title']  = "Halaman sub menu";
            $data['js']     = "/sub_menu/VSubMenuJs";
            $data['css']    = "/sub_menu/VSubMenuCss";
            $data['sub_menu'] = M_SubMenu::all();
            $data['content']='sub_menu/VSubMenu';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['tipe_menu'] = M_MenuType::where("status",'on')->get();
        $data['js']     = "/sub_menu/VSubMenuJs";
        $data['css']    = "/sub_menu/VSubMenuCss";
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='sub_menu/VFormAddSubMenu';
        $this->load->view('VBackend',$data);
    }

    public function store(){

        $menu = new M_SubMenu;
        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->menu_id = $this->input->post("menu_id");
        $menu->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('SubMenu'));

    }

    public function edit($id){
        $menu = M_SubMenu::find($id);
        $data['tipe_menu'] = M_MenuType::where("status",'on')->get();
        $data['list_menu'] = M_Menu::where("status",'on')->get();
        $data['menu'] = $menu;
        $data['title']  = "Halaman Edit menu";
        $data['content']='sub_menu/VFormUpdateSubMenu';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu =  M_SubMenu::find($id);
        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->menu_id = $this->input->post("menu_id");
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('SubMenu'));
    }

    public function destroy($id){
        $menu = M_SubMenu::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('SubMenu'));
    }
}