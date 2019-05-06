<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('MLogin');
	}

	public function index()
	{
		if (isset($_POST['btn_login'])){
				$username = $_POST['txt_user'];
				$password = $_POST['txt_pass'];
				$notif = User::where("email",$username)->where("password",$password)->first();


				if($notif != null){
					$this->load->library('session');
					$this->session->set_userdata('Login','OnLogin');
					$this->session->set_userdata('username',$notif->name);
					$this->session->set_userdata('email',$notif->email);
					$this->session->set_userdata('picture',$notif->picture);
					redirect(site_url('Welcome/DataBarang'));
				}			
				else{
					$this->load->library('session');
					$this->session->unset_userdata('Login');
					redirect(site_url('Login'));
				}
			}

		$this->load->view('VLogin');
	}

}