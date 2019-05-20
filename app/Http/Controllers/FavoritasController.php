<?php

namespace App\Http\Controllers;

use App\Favorita;
use App\User;
use DB;
use Illuminate\Http\Request;

class FavoritasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	//El id del usuario autentificado
    	$user_id = \Auth::user()->id;
    	//$user = User::find($user_id);
    	//$user = User::with('favoritas')->get();
        $favoritas = Favorita::with('novela')->where('user_id', $user_id)->get();
    	return view('users.biblioteca', compact('favoritas'));
    }

    public function addNovel($id)
    {
    	//Recolectamos el id del usuario identificado
    	$user_id = \Auth::user()->id;
    	$novela_id = $id;

    	$favorita = new Favorita();
    	$favorita->user_id = $user_id;
    	$favorita->novela_id = $novela_id;
    	$favorita->save();

    	return back();
    }

    public function deleteNovel($id)
    {
    	//Recolectamos el id del user identificado
    	$user_id = \Auth::user()->id;
    	$novela_id = $id;

    	DB::table('favoritas')->where('user_id', $user_id)
    						 ->where('novela_id', $novela_id)
    						 ->delete();
    	return back();
    }
}
