<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";
    public $incrementing = false;
    protected $fillable = ['kode_type', 'nama_type'];

    public function kendaraan()
    {
    	return $this->hasMany('App\Kendaraan');
    }

    public function merk()
    {
    	return $this->hasMany('App\Merk','id_type');
    }
}
