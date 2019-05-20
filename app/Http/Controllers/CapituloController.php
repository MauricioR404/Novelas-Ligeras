<?php

namespace App\Http\Controllers;

use App\Capitulo;
use App\Mail\CapituloNew;
use App\Novela;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class CapituloController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$capitulos = Capitulo::paginate(5);

        //$capitulos = Capitulo::with('novela')->get();
        $capitulos = Capitulo::orderBy('id', 'desc')->paginate(5);
        return view('admin.capitulo.listar', compact('capitulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $novelas = Novela::all()->pluck('nombre', 'id');

        return view('admin.capitulo.create', compact('novelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valido los campos
        $validacion = $this->validate($request, [
            'nombre' => 'required',
            'traductor' => 'required',
            'novela_id' => 'numeric|required',
            'contenido' => 'required',
            'numCapitulo' => 'numeric|required',
            'precio' => 'numeric',
        ]);

        //Almaceno el id
        $novela_id = $request->input('novela_id');
        //Busco la novela
        $novela = Novela::find($novela_id);
        //Almaceno el nombre
        $novela_nombre = $novela->nombre;
        //Almaceno el numero del capitulo
        $capitulo_num = $request->input('numCapitulo');

        //Enviar mensajes a las personas que estan suscritos al la novela para saber que se estreno un capitulo, envio el nombre y el numero del capitulo.
        Mail::to('correo@mail')->queue(new CapituloNew($novela_nombre, $capitulo_num));

        //Almaceno en la base de datos y me aseguro que en el modelo esten los campos que quiero insertar y asi me aseguro de evitar la asignacion masiva.
        $capitulo = Capitulo::create($request->all());



        return back()->with('info', ['success', 'Se ha creado el capitulo']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($novel, $name, $id)
    {
        $idLimpido = Str::after($id, 'capitulo-');
        $capitulo = Capitulo::findOrFail($idLimpido);

        $capUltimo = DB::table('capitulos')
                            ->select('numCapitulo')
                            ->orderBy('numCapitulo', 'desc')
                            ->limit(1)
                            ->get();


        if($capitulo->numCapitulo > 0 && $capitulo->numCapitulo !== $capUltimo[0]->numCapitulo)
        {
            $next = $capitulo->numCapitulo + 1;
            $previous = $capitulo->numCapitulo - 1;
            //return "1";
            return view('users.capitulo', compact('capitulo', 'novel', 'name', 'next', 'previous'));
        }elseif($capitulo->numCapitulo === $capUltimo[0]->numCapitulo)
        {
            $previous = $capitulo->numCapitulo - 1;
            $next = 0;
            //return "2";
            return view('users.capitulo', compact('capitulo', 'novel', 'name', 'previous', 'next'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //La informacion del capitulo
        $capitulo = Capitulo::find($id);
        //La informacion de la novela, solamente el id y el nombre
        $novelas = Novela::all()->pluck('nombre', 'id');

        return view('admin.capitulo.editar', compact('capitulo', 'novelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = $this->validate($request, [
            'nombre' => 'required',
            'traductor' => 'required',
            'novela_id' => 'numeric|required',
            'contenido' => 'required',
            'numCapitulo' => 'numeric|required',
            'precio' => 'numeric',
        ]);

        $capitulo = Capitulo::find($id);
        $capitulo->update($request->all());

        return back()->with('info', ['success', 'Se ha modificado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capitulo = Capitulo::find($id);
        $capitulo->delete();

        return back()->with('info', ['success', 'El archivo se ha eliminado correctamente']);
        return back()->with('info', ['success', 'Se ha eliminado correctamente']);
    }

}
