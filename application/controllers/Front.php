<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $menu_side_c = M_Menu::where("type_menu_id",5)->where('status','on')->with('sub_menu')->get();
        $menu_behind_c = M_Menu::where("type_menu_id",4)->where('status','on')->with('sub_menu')->get();
        $menu_header = M_Menu::where("type_menu_id",9)->where('status','on')->with('sub_menu')->get();
        $my_acount = M_Menu::where("type_menu_id",6)->where("status","on")->with("sub_menu")->get();
        $banner = M_Banner::all();
        $banner_1 = M_Banner::find(6);
        $banner_2 = M_Banner::find(7);
        $banner_3 = M_Banner::find(8);
        $barang = M_Barang::all();
        $config = M_Config::find(1);

        $data['menu_side_c']    = $menu_side_c;
        $data['menu_behind_c']  = $menu_behind_c;
        $data['menu_header']    = $menu_header;
        $data['banner']         = $banner;
        $data['banner_1']       = $banner_1;
        $data['banner_2']       = $banner_2;
        $data['banner_3']       = $banner_3;
        $data['barang']         = $barang;
        $data['config']         = json_decode($config->body);
        $data['config']         = json_decode($data['config']->form);
        $data['my_acount']      = $my_acount;

        $this->load->view("e-shop/index",$data);
    }
}