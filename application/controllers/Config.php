<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
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
            $config = M_Config::find(1);
            $data['title']  = "Halaman Konfigurasi";
            $data['js']     = "/config/VConfigJs";
            $data['css']    = "/config/VConfigCss";
            $data['config'] = json_decode($config->body);
            $form = isset($data['config']->form) ? json_decode($data['config']->form) : [];
            $file = isset($data['config']->file) ? json_decode($data['config']->file) : [];
            $data['form'] = isset($form) ? $form :[];
            $data['file']   = isset($file) ? $file :[];

            $data['content']='config/VFormUpdateConfig';
            $this->load->view('VBackend',$data);
        }

    }

    public function create(){
        $data['title'] = "Halaman tambah tipe menu";
        $data['content']='config/VFormAddConfig';
        $this->load->view('VBackend',$data);
    }

    public function store(){
        $menu = new M_Config;
        $menu->name = $this->input->post("name");
        $menu->status = $this->input->post("status");
        $menu->save();

        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Config'));

    }

    public function edit($id){
        $menu = M_Config::find($id);
        $data['menu'] = $menu;
        $data['title']  = "Halaman Tambah Tipe menu";
        $data['content']='config/VFormUpdateConfig';
        $this->load->view('VBackend',$data);
    }

    public function update($id,$request){

        $config['upload_path']          = './upload/';
        $config['allowed_types']        =  '*';

        $this->load->library('upload', $config);
        $menu = M_Config::find($id);
        if ( ! $this->upload->do_upload('gambar')){

            $data['config'] = json_decode($menu->body);
            $file = json_decode($data['config']->file);

            $form = json_encode($this->input->post());
            $file = json_encode($file);

            $arr = array(
                'form'    => $form,
                'file'    => $file
            );


            $menu->body = json_encode($arr);
            $menu->update();
            $this->session->set_flashdata("message","Data berhasil diupdate");
            redirect(site_url('Config'));
        }else{
            $form = json_encode($this->input->post());
            $file = json_encode($_FILES);
            $arr = array(
                'form'    => $form,
                'file'    => $file
            );


            $menu->body = json_encode($arr);
            $menu->update();
            $this->session->set_flashdata("message","Data berhasil diupdate");
            redirect(site_url('Config'));
        }


    }

    public function destroy($id){
        $menu = M_Config::find($id);
        $menu->delete();
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Config'));
    }
}