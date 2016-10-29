<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
	protected $table = "kendaraan";
    public $incrementing = false;
    protected $fillable = ['no_plat', 'tahun', 'tarif_perjam', 'status_rental'];

    public function merk()
    {
    	return $this->belongsTo('App\Merk');
    }
}
