<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('MSudi');
	}

	public function index()
	{
		if($this->session->userdata('Login'))
		{
			$data['content']='VBlank';
			$this->load->view('VBackend',$data);
		}
		else
		{
			 redirect(site_url('Login'));
		}

	}



    public function DataKategori()
    {



        if($this->uri->segment(4)=='view')
        {
           
            $nis=$this->uri->segment(3);
            $tampil=$this->MSudi->GetDataWhere('tbl_kategori','kd_kategori',$nis)->row();

            $data['detail']['kd_kategori']= $tampil->kd_kategori;
            $data['detail']['nama']= $tampil->nama;
            $data['detail']['status']= $tampil->status;

            $data['content']='kategori/VFormUpdateKategori';
        }
        else
        {
                $data['title']  = "Halaman kategori";
                $data['js']     = "/kategori/VKategoriJs";
                $data['css']    = "/kategori/VKategoriCss";
            
            $data['DataKategori']=$this->MSudi->GetData('tbl_kategori');
            $data['content']='kategori/VKategori';
        }

        $this->load->view('VBackend',$data);
    }


    public function VFormAddKategori()
    {
        $data['title']  = "Halaman tambah kategori";
        $data['js']     = "VBarangJs";
        $data['css']    = "VBarangCss";
        $data['content']='kategori/VFormAddKategori';
        $this->load->view('VBackend',$data);
    }
    public function AddDataKategori()
    {
        $add['kd_kategori']=$this->input->post('kd_kategori');
        $add['nama']= $this->input->post('nama');
        $add['status']= $this->input->post('status');
        $this->MSudi->AddData('tbl_kategori',$add);
        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Kategori/DataKategori'));
    }



    public function UpdateDataKategori()
    {
        $nis=$this->input->post('kd_kategori');
        $update['nama']= $this->input->post('nama');
        $update['status']= $this->input->post('status');
        $this->MSudi->UpdateData('tbl_kategori','kd_kategori',$nis,$update);
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('Kategori/DataKategori'));
    }


    public function DeleteDataKategori()
    {
        $nis=$this->uri->segment('3');
        $this->MSudi->DeleteData('tbl_kategori','kd_kategori',$nis);
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Kategori/DataKategori'));

    }





    public function Logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}

}