<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlashSale extends CI_Controller {
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
            $data['title']  = "Halaman flash sale";
            $data['js']     = "/flash_sale/VFlashSaleJs";
            $data['css']    = "/flash_sale/VFlashSaleCss";
            $data['flash_sale'] = M_FlashSale::all();
            $data['content']='flash_sale/VFlashSale';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['title'] = "Halaman tambah flash sale";
        $data['content']='flash_sale/VFormAddFlashSale';
        $this->load->view('VBackend',$data);
    }

    public function store(){
        $menu               = new M_FlashSale;
        $menu->name         = $this->input->post("name");
        $menu->discount     = $this->input->post("discount");
        $menu->start_time   = $this->input->post("start_time");
        $menu->end_time     = $this->input->post("end_time");
        $menu->status       = $this->input->post("status");
        $menu->save();
        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('FlashSale'));

    }

    public function edit($id){
        $menu = M_FlashSale::find($id);
        $data['menu'] = $menu;
        $data['title']  = "Halaman Tambah Tipe menu";
        $data['content']='flash_sale/VFormUpdateFlashSale';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){
        $menu = M_FlashSale::find($id);
        $menu->name         = $this->input->post("name");
        $menu->discount     = $this->input->post("discount");
        $menu->start_time   = $this->input->post("start_time");
        $menu->end_time     = $this->input->post("end_time");
        $menu->status       = $this->input->post("status");
        $menu->update();
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('FlashSale'));
    }

    public function destroy($id){
        $menu = M_FlashSale::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('FlashSale'));
    }
}