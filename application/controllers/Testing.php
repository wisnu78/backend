<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Jenssegers\Blade\Blade;
class Testing extends CI_Controller {

    public function index(){
        $blade = new Blade('views', 'cache');

        echo $blade->make('test', ['name' => 'John Doe']);
    }
}