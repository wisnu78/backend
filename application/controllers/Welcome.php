<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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



    public function DataBarang()
    {


        if($this->uri->segment(4)=='view')
        {
            $data['kategori'] = Kategori::all();
            $data['js']     = 'VBarangJs';
            $data['css']     = 'VBarangCss';
            $nis=$this->uri->segment(3);
            $tampil=$this->MSudi->GetDataWhere('tbl_barang','kd_barang',$nis)->row();

            $data['detail']['kd_barang']= $tampil->kd_barang;
            $data['detail']['nama']= $tampil->nama;
            $data['detail']['harga']= $tampil->harga;
            $data['detail']['kategori_id']= $tampil->kategori_id;
            $data['detail']['detail']= $tampil->detail;
            $data['detail']['gambar']= $tampil->gambar;

            $data['content']='VFormUpdateSiswa';
        }
        else
        {
            $data['DataBarang']=$this->MSudi->GetData('tbl_barang');
            $data['content']='VBarang';
            $data['css']    = 'VBarangCss';
            $data['js']     = 'VBarangJs';
            $data['title']  = "Daftar Barang";
        }

        $this->load->view('VBackend',$data);
    }


    public function VFormAddBarang()
    {
        $data['kategori'] = Kategori::all();
        $data['content']='VFormAddBarang';
        $data['title']  = "Halaman tambah barang";
        $data['js'] = "VBarangJs";
        $data['css'] = "VBarangCss";
        $this->load->view('VBackend',$data);
    }
    public function AddDataBarang()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        =  '*';

        $this->load->library('upload', $config);
//        echo "<pre>";
//          print_r($this->upload->data());
//        //print_r($_FILES); die();
//        die();
//        echo "</pre>";
        if ( ! $this->upload->do_upload('gambar')){
            echo "masuk";
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            //$this->load->view('v_upload', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
             echo "<pre>";
             print_r($_POST);
             echo "</pre>";
             //die();
//
            $add['kd_barang']=$this->input->post('kd_barang');
            $add['nama']= $this->input->post('nama');
            $add['harga']= $this->input->post('harga');
            $add['detail']= $this->input->post('detail');
            $add['kategori_id']= $this->input->post('kategori_id');
            $add['gambar']= $data['upload_data']['file_name'];
            $this->MSudi->AddData('tbl_barang',$add);
            $this->session->set_flashdata("message","Data berhasil dibuat");
            redirect(site_url('Welcome/DataBarang'));
            //$this->load->view('v_upload_sukses', $data);
        }


    }



    public function UpdateDataBarang()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        =  '*';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')){
            $this->session->set_flashdata("message","Data berhasil di update");
            $nis=$this->input->post('kd_barang');
            $update['nama']= $this->input->post('nama');
            $update['harga']= $this->input->post('harga');
            $update['detail']= $this->input->post('detail');
            $update['kategori_id']= $this->input->post('kategori_id');
            $this->MSudi->UpdateData('tbl_barang','kd_barang',$nis,$update);
            redirect(site_url('Welcome/DataBarang'));
        }else{
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata("message","Data berhasil di update");
            $nis=$this->input->post('kd_barang');
            $update['gambar']= $data['upload_data']['file_name'];
            $update['nama']= $this->input->post('nama');
            $update['harga']= $this->input->post('harga');
            $update['detail']= $this->input->post('detail');
            $update['kategori_id']= $this->input->post('kategori_id');
            $this->MSudi->UpdateData('tbl_barang','kd_barang',$nis,$update);
            redirect(site_url('Welcome/DataBarang'));

        }


    }


    public function DeleteDataBarang()
    {
        $this->session->set_flashdata("message","Data berhasil di hapus");
        $nis=$this->uri->segment('3');
        $this->MSudi->DeleteData('tbl_barang','kd_barang',$nis);
        redirect(site_url('Welcome/DataBarang'));
    }





    public function Logout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}

}