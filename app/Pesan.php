<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
	protected $table = "pesan";
    protected $dates = ['expired_at'];
}
