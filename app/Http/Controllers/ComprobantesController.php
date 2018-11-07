<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comprobante;

class ComprobantesController extends Controller
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

    // Get all comprobantes
    public function index(Request $request){
        $comprobantes = Comprobante::All();

        return $comprobantes;
    }

    // Get one comprobante
    public function show(Request $request, $id){
        $comprobante = Comprobante::findOrFail($id);

        return $comprobante;
    }

    // Create comprobante
    public function store(Request $request){
        $user_id                = $request->input('user_id');
        $nombre_beneficiario    = $request->input('nombre_beneficiario');
        $fecha_entrega          = $request->input('fecha_entrega');
        $nro_piezas             = $request->input('nro_piezas');
        $material               = $request->input('material');
        $tiempo_estimado        = $request->input('tiempo_estimado');
        $fecha_solicitud        = $request->input('fecha_solicitud');
        $foto                   = "";

        // Guardar en la BD
        $comprobante = new Comprobante;
        $comprobante->user_id               = $user_id;
        $comprobante->nombre_beneficiario   = $nombre_beneficiario;
        $comprobante->fecha_entrega         = $fecha_entrega;
        $comprobante->nro_piezas            = $nro_piezas;
        $comprobante->material              = $material;
        $comprobante->tiempo_estimado       = $tiempo_estimado;
        $comprobante->fecha_solicitud       = $fecha_solicitud;
        $comprobante->foto                  = $foto;

        $status = $comprobante->save();

        return ['inserted' => $status];
    }
}