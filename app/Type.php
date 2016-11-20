<?php

namespace App;

use Session;
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

    public static function boot()
    {
        parent::boot();
        self::deleting(function($type) {
            if ($type->merk->count() > 0) {
                $html = 'Tipe tidak bisa dihapus karena datanya berada pada merk mobil : ';
                $html .= '<ul>';
                foreach ($type->merk as $data) {
                    $html .= "<li>$data->nama_merk</li>";
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
