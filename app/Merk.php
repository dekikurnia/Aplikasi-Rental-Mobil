<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = "merk";
    public $incrementing = false;
    protected $fillable = ['kode_merk', 'nama_merk'];

    public function kendaraan()
    {
    	return $this->hasMany('App\Kendaraan');
    }

    public function type()
    {
    	return $this->belongsTo('App\Type');
    }
}
