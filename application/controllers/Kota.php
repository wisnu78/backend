<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {
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



    public function DataKota()
    {



        if($this->uri->segment(4)=='view')
        {
           
            $nis=$this->uri->segment(3);
            $tampil=$this->MSudi->GetDataWhere('tbl_kota','kd_kota',$nis)->row();

            $data['detail']['kd_kota']= $tampil->kd_kota;
            $data['detail']['nama']= $tampil->nama;
            $data['detail']['tarif']= $tampil->tarif;

            $data['content']='Kota/VFormUpdateKota';
        }
        else
        {
            $data['title']  = "Halaman Kota";
            $data['js']     = "/kota/VKotaJs";
            $data['css']    = "/kota/VKotaCss";
            $data['DataKota']=$this->MSudi->GetData('tbl_kota');
            $data['content']='Kota/VKota';
        }

        $this->load->view('VBackend',$data);
    }


    public function VFormAddKota()
    {
        $data['content']='Kota/VFormAddKota';
        $this->load->view('VBackend',$data);
    }
    public function AddDataKota()
    {
        $add['kd_kota']=$this->input->post('kd_kota');
        $add['nama']= $this->input->post('nama');
        $add['tarif']= $this->input->post('tarif');
        $this->MSudi->AddData('tbl_Kota',$add);
        $this->session->set_flashdata("message","Data berhasil dibuat");
        redirect(site_url('Kota/DataKota'));
    }



    public function UpdateDataKota()
    {

        $nis=$this->input->post('kd_kota');
        $update['nama']= $this->input->post('nama');
        $update['tarif']= $this->input->post('tarif');
        $this->MSudi->UpdateData('tbl_Kota','kd_kota',$nis,$update);
        $this->session->set_flashdata("message","Data berhasil diupdate");
        redirect(site_url('Kota/DataKota'));
    }


    public function DeleteDataKota()
    {
        $nis=$this->uri->segment('3');
        $this->MSudi->DeleteData('tbl_Kota','kd_kota',$nis);
        $this->session->set_flashdata("message","Data berhasil didelete");
        redirect(site_url('Kota/DataKota'));
    }





    public function Logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}

}