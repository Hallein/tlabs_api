<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Acta;
use App\Tema;
use App\Acuerdo;

class ActasController extends Controller
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

    // Get all actas
    public function index(Request $request){
        $actas = Acta::with('user')->withCount('participantes')->get();

        return $actas;
    }

    // Get one acta
    public function show(Request $request, $id){
        $acta = Acta::with('user')->with('participantes')->with('temas')->with('acuerdos')->findOrFail($id);

        return $acta;
    }

    // Create acta
    public function store(Request $request){
        $guia   = $request->input('guia');
        $lugar  = $request->input('lugar');
        $fecha  = date('Y-m-d');
        $foto   = '';

        $participantes  = $request->input('participantes');
        $temas          = $request->input('temas');
        $acuerdos       = $request->input('acuerdos');

        $acta = new Acta;
        $acta->guia     = $guia;
        $acta->lugar    = $lugar;
        $acta->fecha    = $fecha;
        $acta->foto     = $foto;

        $status = $acta->save();

        // TODO cambiar a los verdaderos users que vendrán por parámetro
        $users = User::find($participantes);

        // Asociamos los users al acta creada
        $acta->participantes()->attach($users);

        // Insertar los temas
        foreach($temas as $tema){
            $nuevoTema          = new Tema;            
            $nuevoTema->acta_id = $acta->id;
            $nuevoTema->tema    = $tema;

            $nuevoTema->save();
        }

        //  Insertar los acuerdos 
        foreach($acuerdos as $acuerdo){
            $nuevoAcuerdo           = new Acuerdo;
            $nuevoAcuerdo->acta_id  = $acta->id;
            $nuevoAcuerdo->acuerdo  = $acuerdo;

            $nuevoAcuerdo->save();
        }

        return ['inserted' => $status];
    }

    // Update acta
    public function update(Request $request, $id){
        $guia   = $request->input('guia');
        $lugar  = $request->input('lugar');
        $foto   = '';

        $participantes  = $request->input('participantes');
        $temas          = $request->input('temas');
        $acuerdos       = $request->input('acuerdos');

        // TODO tratamiento de la imagen

        $acta = Acta::find($id);

        $acta->guia     = $guia;
        $acta->lugar    = $lugar;
        $acta->foto     = $foto;

        $acta->save();

        return $acta;
    }

    // Delete acta
    public function delete(Request $request, $id){
        $status = Acta::destroy($id);

        return ['deleted' => $status];
    }
}

