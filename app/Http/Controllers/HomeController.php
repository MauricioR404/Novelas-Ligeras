<?php

namespace App\Http\Controllers;
use DB;
use App\Capitulo;
use App\Novela;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Sacar los datos de los capitulos que se van estrenando
        $capitulos = Capitulo::orderBy('id', 'desc')
                        ->join('novelas', 'novelas.id', '=', 'capitulos.novela_id')
                        ->select('capitulos.id', 'capitulos.novela_id', 'capitulos.nombre as capNombre', 'capitulos.numCapitulo', 'capitulos.created_at', 'capitulos.traductor','novelas.nombre as NovNombre', 'novelas.autor', 'novelas.generos')
                        ->limit(7)
                        ->get();

        //Sacar 5 novelas para las de inicio
        $novelas = DB::table('novelas')
                                 ->select('nombre', 'imagen', 'id')
                                 ->get()
                                 ->random(8);

        //Sacar 6 Novelas Favoritas de los usuarios
        if(\Auth::user())
        {
            $user_id = \Auth::user()->id;
            $favoritas = DB::table('favoritas')
                                    ->join('novelas', 'novelas.id', '=', 'favoritas.novela_id')
                                    ->select('novelas.nombre', 'novelas.imagen', 'novelas.id')
                                    ->where('user_id', $user_id)
                                    ->limit(6)
                                    ->get();
        }else{
            $favoritas = [];
        }


        return view('index', compact('capitulos', 'novelas', 'favoritas'));
    }

    public function dashboard()
    {
        return view('admin.index');
    }
}
