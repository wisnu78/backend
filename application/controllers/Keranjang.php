<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
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



    public function DataKeranjang()
    {



        if($this->uri->segment(4)=='view')
        {
           
            $nis=$this->uri->segment(3);
            $tampil=$this->MSudi->GetDataWhere('tbl_keranjang','kd_keranjang',$nis)->row();

            $data['detail']['kd_keranjang']= $tampil->kd_keranjang;
            $data['detail']['user_id']= $tampil->user_id;
            $data['detail']['barang_id']= $tampil->barang_id;
            $data['detail']['total']= $tampil->total;
            $data['barang']=$this->MSudi->GetData('tbl_barang');
            $data['user']=$this->MSudi->GetData('tbls_user');
            $data['content']='keranjang/VFormUpdateKeranjang';
        }
        else
        {
            
            $data['DataKeranjang']=$this->MSudi->GetData('tbl_keranjang');
            $data['content']='Keranjang/VKeranjang';
        }
         
        $this->load->view('VBackend',$data);
    }


    public function VFormAddKeranjang()
    {
        $data['user']=$this->MSudi->GetData('tbls_user');
        $data['barang']=$this->MSudi->GetData('tbl_barang');
        $data['content']='Keranjang/VFormAddKeranjang';
        $this->load->view('VBackend',$data);
    }
    public function AddDataKeranjang()
    {
        $add['kd_keranjang']=$this->input->post('kd_keranjang');
        $add['user_id']= $this->input->post('user_id');
        $add['barang_id']= $this->input->post('barang_id');        
        $add['total']= $this->input->post('total');        
        $this->MSudi->AddData('tbl_keranjang',$add);
        redirect(site_url('Keranjang/DataKeranjang'));
    }



    public function UpdateDataKeranjang()
    {
        $nis=$this->input->post('kd_keranjang');
        $update['user_id']= $this->input->post('user_id');
        $update['barang_id']= $this->input->post('barang_id');        
        $update['total']= $this->input->post('total');   
        $this->MSudi->UpdateData('tbl_keranjang','kd_keranjang',$nis,$update);
        redirect(site_url('Keranjang/DataKeranjang'));
    }


    public function DeleteDataKeranjang()
    {
        $nis=$this->uri->segment('3');
        $this->MSudi->DeleteData('tbl_keranjang','kd_keranjang',$nis);
        redirect(site_url('Keranjang/DataKeranjang'));
    }





    public function Logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}

}