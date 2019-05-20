<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{

	protected $fillable = [
	        'nombre', 'contenido', 'traductor', 'numCapitulo', 'precio', 'novela_id',
	    ];


	public function novela()
	{
		return $this->belongsTo(Novela::class);
	}
}
