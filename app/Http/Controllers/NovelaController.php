<?php

namespace App\Http\Controllers;

use DB;
use App\Novela;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NovelaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        //$this->middleware(['role:Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $novelas = Novela::orderBy('id', 'desc')->paginate(5);
        return view('admin.novela.listar', compact('novelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.novela.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validos los datos
        $validacion =  $this->validate($request, [
            'nombre' => 'required',
            'autor' => 'required',
            'generos' => 'required',
            'traductor' => 'required',
            'editor' => 'required',
            'descripcion' => 'required',
            'imagen' =>'required|image',
        ]);

        //Almacenos los datos
        $nombre = $request->input('nombre');
        $autor = $request->input('autor');
        $generos = $request->input('generos');
        $traductor = $request->input('traductor');
        $editor = $request->input('editor');
        $descripcion = $request->input('descripcion');
        $imagen = $request->file('imagen');

        //Almacenos los datos dentro del objecto "Novela"
        $novela = new Novela();
        $novela->nombre = $nombre;
        $novela->autor = $autor;
        $novela->generos = $generos;
        $novela->traductor = $traductor;
        $novela->editor = $editor;
        $novela->descripcion = $descripcion;

        //Valido la imagen.
        if($imagen)
        {
            //Poner un nombre unico
            $image_path = time().$imagen->getClientOriginalName();
            //Guardo en la carpeta (storage/app/novelas)
            Storage::disk('novelas')->put($image_path, File::get($imagen));
            //Guardo en el objecto Noveela
            $novela->imagen = $image_path;
        }
        $novela->save();

        return back()->with('info', ['success', 'La novela se ha creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $nombre)
    {
        //La novela principal
        $novela = Novela::findOrFail($id);
        //Recomendaciones de la parte final
        $novelas = DB::table('novelas')
                                 ->select('nombre', 'imagen', 'id')
                                 ->get()
                                 ->random(6);
        //Ultimo capitulo de la novela
        $capUltimo = DB::table('capitulos')
                                ->select('numCapitulo', 'created_at')
                                ->orderBy('id', 'desc')
                                ->limit(1)
                                ->get();
        //Capitulos de la $novela principal
        $capitulos = DB::table('capitulos')
                                ->where('novela_id', $id)
                                ->select('id', 'nombre', 'traductor', 'numCapitulo')
                                ->get();
        //Verificamos si la novela esta agregada en la tabla favoritas
        if(\Auth::user())
        {
        $usuario_id =\Auth::user()->id;
        $favorita = DB::table('favoritas')
                                ->where('user_id', $usuario_id)
                                ->where('novela_id', $id)
                                ->count();
        }else{
            $favorita = [];
        }

        //El contador es para divir los capitulos
        $contador = 1;

        return view('users.novela', compact('novela','novelas','capUltimo','capitulos', 'favorita', 'contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novela = Novela::find($id);
        return view('admin.novela.editar', compact('novela'));
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
        $validacion =  $this->validate($request, [
            'nombre' => 'required',
            'autor' => 'required',
            'generos' => 'required',
            'traductor' => 'required',
            'editor' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image',
        ]);

        //Almacenos los datos
        $id_novela = $id;
        $nombre = $request->input('nombre');
        $autor = $request->input('autor');
        $generos = $request->input('generos');
        $traductor = $request->input('traductor');
        $editor = $request->input('editor');
        $descripcion = $request->input('descripcion');
        $imagen = $request->file('imagen');

        //Almacenos los datos dentro del objecto "Novela"
        $novela = Novela::find($id_novela);
        $novela->nombre = $nombre;
        $novela->autor = $autor;
        $novela->generos = $generos;
        $novela->traductor = $traductor;
        $novela->editor = $editor;
        $novela->descripcion = $descripcion;

        if($imagen)
        {
            $image_path = time().$imagen->getClientOriginalName();
            //Guardo en la carpeta (storage/app/novelas)
            Storage::disk('novelas')->put($image_path, File::get($imagen));
            //Elimino la imagen anterior de la novela
            Storage::disk('novelas')->delete($novela->imagen);
            //Guardo en el objecto Noveela
            $novela->imagen = $image_path;

        }

        $novela->update();

        return back()->with('info', ['success', 'La novela se ha creado correctamente']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Encuentro la novela
        $novela = Novela::find($id);

        if(Storage::disk('novelas')->exists($novela->imagen))
        {
            Storage::disk('novelas')->delete($novela->imagen);
        }

        $novela->delete();

        return back()->with('info', ['success', 'El archivo se ha eliminado correctamente']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('novelas')->get($filename);
        return new Response($file, 200);
    }

}
