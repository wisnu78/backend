<?php
use Jenssegers\Blade\Blade;
if (!function_exist('view')){
    function view($view,$data=[]){
        $path = APPPATH.'views';
        $blade = new Blade($path,$path.'/cache');
        echo $blade->make($view,$data);
    }
}