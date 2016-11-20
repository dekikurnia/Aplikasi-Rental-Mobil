<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = "merk";
    public $incrementing = false;
    protected $fillable = ['kode_merk', 'nama_merk'];

    public function kendaraan()
    {
    	return $this->hasMany('App\Kendaraan', 'id_merk');
    }

    public function type()
    {
    	return $this->belongsTo('App\Type');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($merk) {
            if ($merk->kendaraan->count() > 0) {
                $html = 'Merk tidak bisa dihapus karena datanya berada pada kendaraan dengan No. Plat : ';
                $html .= '<ul>';
                foreach ($merk->kendaraan as $data) {
                    $html .= "<li>$data->no_plat</li>";
                }
                $html .= '</ul>';
                Session::flash("flash_notification", [
                    "level"=>"danger",
                    "message"=>$html
                    ]);
                return false;
            }
        });
    }
}

