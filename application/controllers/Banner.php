<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	function __construct(){
	parent::__construct();
        $this->load->model('MSudi');
        $this->load->helper(array('form', 'url'));
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



    public function DataBanner()
    {



        if($this->uri->segment(4)=='view')
        {
            $data['css'] = '/banner/VBannerCss';
            $data['js'] = '/banner/VBannerJs';
            $data['title']  = "Halaman edit banner";
           
            $nis=$this->uri->segment(3);
            $tampil=$this->MSudi->GetDataWhere('tbl_banner','kd_banner',$nis)->row();

            $data['detail']['kd_banner']= $tampil->kd_banner;
            $data['detail']['nama']= $tampil->nama;
            $data['detail']['gambar']= $tampil->gambar;

            $data['content']='Banner/VFormUpdateBanner';
        }
        else
        {
            $data['title'] = "Halaman banner";
            $data['css'] = '/banner/VBannerCss';
            $data['js'] = '/banner/VBannerJs';
            $data['DataBanner']=$this->MSudi->GetData('tbl_banner');
            $data['content']='Banner/VBanner';
        }

        $this->load->view('VBackend',$data);
    }


    public function VFormAddBanner()
    {
        $data['css'] = '/banner/VBannerCss';
        $data['js'] = '/banner/VBannerJs';
        $data['title']  = "Halaman tambah banner";
        $data['content']='Banner/VFormAddBanner';
        $this->load->view('VBackend',$data);
    }
    public function AddDataBanner()
    {
        $config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $this->session->set_flashdata("message","Data berhasil dibuat");
        if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
            // echo "<pre>";
            // print_r($data['upload_data']['file_name']);
            // echo "</pre>";
            $add['kd_banner']=$this->input->post('kd_banner');
            $add['nama']= $this->input->post('nama');
            $add['gambar']= $data['upload_data']['file_name'];
            $this->MSudi->AddData('tbl_banner',$add);
            redirect(site_url('Banner/DataBanner'));
            //$this->load->view('v_upload_sukses', $data);
		}
        
    }



    public function UpdateDataBanner()
    {
        $config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';

 
        $this->load->library('upload', $config);
        $this->session->set_flashdata("message","Data berhasil diupdate");
        
        if ( ! $this->upload->do_upload('gambar')){
            $nis=$this->input->post('kd_banner');
            $update['nama']= $this->input->post('nama');
            $this->MSudi->UpdateData('tbl_banner','kd_banner',$nis,$update);            
            // echo "Tidak";
		}else{
            // echo "iYA";
			$data = array('upload_data' => $this->upload->data());
            // echo "<pre>";
            // print_r($data['upload_data']['file_name']);
            // echo "</pre>";
            $nis=$this->input->post('kd_banner');
            $update['nama']= $this->input->post('nama');
            $update['gambar']= $data['upload_data']['file_name'];
            $this->MSudi->UpdateData('tbl_banner','kd_banner',$nis,$update);
            //$this->load->view('v_upload_sukses', $data);
        }
        
        // die();
        redirect(site_url('Banner/DataBanner'));
    }


    public function DeleteDataBanner()
    {
        $nis=$this->uri->segment('3');
        $this->MSudi->DeleteData('tbl_banner','kd_banner',$nis);
        $this->session->set_flashdata("message","Data berhasil di delete");
        redirect(site_url('Banner/DataBanner'));
    }





    public function Logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}

}