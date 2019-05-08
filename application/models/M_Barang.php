<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class M_Barang extends Eloquent {

    protected $table = "goods"; // table name

    public function colour(){
        return $this->belongsToMany(M_Colour::class,'m__barang_m__colour','m__colour_id');
    }

    public function promo(){
        return $this->belongsTo(M_Promo::class);
    }
}