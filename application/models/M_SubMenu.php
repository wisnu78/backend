<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class M_SubMenu extends Eloquent {

    protected $table = "sub_menu"; // table name

    public function menu(){
        return $this->belongsTo(M_Menu::class);
    }
}