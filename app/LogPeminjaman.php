<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPeminjaman extends Model
{
    protected $fillable = ['id', 'id_kendaraan', 'id_pelanggan', 'dikembalikan'];
    protected $table = "log_peminjaman";
    public $incrementing = false;

    public function kendaraan()
    {
    	return $this->belongsTo('App\Kendaraan', 'id_kendaraan');
    }

    public function pelanggan()
    {
    	return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }

    protected $casts = [
    'dikembalikan' => 'boolean',
    ];
}

