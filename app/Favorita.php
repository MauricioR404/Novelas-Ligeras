<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorita extends Model
{
    //


    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function novela()
    {
    	return $this->belongsTo('App\Novela', 'novela_id');
    }
}
