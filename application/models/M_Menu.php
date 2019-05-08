<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class M_Menu extends Eloquent {

    protected $table = "menu"; // table name

    public function type_menu(){
        return $this->belongsTo(M_MenuType::class);
    }

    public function sub_menu(){
        return $this->hasMany(M_SubMenu::class,'menu_id','id');
    }
}