<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {
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
            $data['title']  = "Halaman promo";
            $data['js']     = "/promo/VPromoJs";
            $data['css']    = "/promo/VPromoCss";
            $data['promo'] = M_Promo::all();
            $data['content']='promo/VPromo';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['title'] = "Halaman tambah promo";
        $data['content']='promo/VFormAddPromo';
        $this->load->view('VBackend',$data);
    }

    public function store(){
        $menu           = new M_Promo;
        $menu->name     = $this->input->post("name");
        $menu->discount = $this->input->post("discount");
        $menu->status   = $this->input->post("status");
        $menu->save();
        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Promo'));

    }

    public function edit($id){
        $menu = M_Promo::find($id);
        $data['menu'] = $menu;
        $data['title']  = "Halaman Tambah Tipe menu";
        $data['content']='promo/VFormUpdatePromo';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu = M_Promo::find($id);
        $menu->name     = $this->input->post("name");
        $menu->discount = $this->input->post("discount");
        $menu->status   = $this->input->post("status");
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('Promo'));
    }

    public function destroy($id){
        $menu = M_Promo::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Promo'));
    }
}