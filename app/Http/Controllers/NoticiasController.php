<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Noticia;

class NoticiasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // Get all noticias
    public function index(Request $request){
        $noticias = Noticia::All();

        return $noticias;
    }

    // Get one noticia
    public function show(Request $request, $id){
        $noticia = Noticia::findOrFail($id);

        return $noticia;
    }

    // Create noticia
    public function store(Request $request){
        $user_id    = $request->input('user_id');
        $titulo     = $request->input('titulo');
        $cuerpo     = $request->input('cuerpo');
        $fecha      = date('Y-m-d');
        $imagen     = '';

        $noticia = new Noticia;
        $noticia->user_id   = $user_id;
        $noticia->titulo    = $titulo;
        $noticia->cuerpo    = $cuerpo;
        $noticia->fecha     = $fecha;
        $noticia->imagen    = $imagen;

        $status = $noticia->save();

        return ['inserted' => $status];
    }

    // Update noticia
    public function update(Request $request, $id){
        $titulo     = $request->input('titulo');
        $cuerpo     = $request->input('cuerpo');
        $imagen       = '';

        // TODO tratamiento de la imagen

        $noticia = Noticia::find($id);

        $noticia->titulo    = $titulo;
        $noticia->cuerpo    = $cuerpo;
        $noticia->imagen    = $imagen;

        $noticia->save();

        return $noticia;
    }

    // Delete noticia
    public function delete(Request $request, $id){
        $status = Noticia::destroy($id);

        return ['deleted' => $status];
    }
}

