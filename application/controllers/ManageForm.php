<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageForm extends CI_Controller {
    function __construct(){
        parent::__construct();
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
            $data['title']  = "Halaman Manage Form";
            $data['js']     = "/manage_form/VManageFormJs";
            $data['css']    = "/manage_form/VManageFormCss";
            $data['manage_form'] = M_ManageForm::all();
            $data['content']='manage_form/VManageForm';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['tipe_menu'] = M_MenuType::where("status",'on')->get();
        $data['js']     = "/manage_form/VManageFormJs";
        $data['css']    = "/manage_form/VManageFormCss";
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='manage_form/VFormAddManageForm';
        $this->load->view('VBackend',$data);
    }

    public function store(){

        $menu = new M_ManageForm;
        $menu->name = $this->input->post("nama_form");
        $menu->body = $this->input->post("form");
        $menu->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('ManageForm'));

    }

    public function edit($id){
        $data['js']     = "/manage_form/VManageFormJs";
        $menu = M_ManageForm::find($id);
        $data['tipe_menu'] = M_MenuType::where("status",'on')->get();
        $data['list_menu'] = M_Menu::where("status",'on')->get();
        $data['menu'] = $menu;
        $data['title']  = "Halaman Edit menu";
        $data['content']='manage_form/VFormUpdateManageForm';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu =  M_ManageForm::find($id);
        $menu->name = $this->input->post("nama_form");
        $menu->body = $this->input->post("form");
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('ManageForm'));
    }

    public function destroy($id){
        $menu = M_ManageForm::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('ManageForm'));
    }
}