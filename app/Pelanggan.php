<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = "pelanggan";
    public $incrementing = false;
    protected $fillable = ['no_ktp', 'nama', 'alamat', 'telepon'];

}
