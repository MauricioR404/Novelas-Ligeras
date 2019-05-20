<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novela extends Model
{

	public function capitulos()
	{
		return $this->hasMany(Capitulo::class);
	}


}
