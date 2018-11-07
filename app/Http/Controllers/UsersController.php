<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersController extends Controller
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

    // Get all users
    public function index(Request $request){
        $users = User::All();

        return $users;
    }

    // Get one user
    public function show(Request $request, $id){
        $user = User::with('comprobantes')->with('actas')->with('participantes')->findOrFail($id);

        return $user;
    }

    // Create user
    public function store(Request $request){
        $username   = $request->input('username');
        $password   = $request->input('password');
        $nombre     = $request->input('nombre');
        $tipo       = $request->input('tipo');
        $foto       = '';

        // Encriptar el password
        $hash = Hash::make($password);

        // Guardar user en la BD
        $user = new User;
        $user->username     = $username;
        $user->password     = $hash;
        $user->nombre       = $nombre;
        $user->tipo         = $tipo;
        $user->foto_perfil  = $foto;

        $status = $user->save();

        return ['inserted' => $status];


    }

    // Update user
    public function update(Request $request, $id){
        $username   = $request->input('username');
        $nombre     = $request->input('nombre');
        $tipo       = $request->input('tipo');
        $foto       = '';

        $user = User::find($id);

        $user->username     = $username;
        $user->nombre       = $nombre;
        $user->tipo         = $tipo;
        $user->foto_perfil  = $foto;

        $user->save();

        return $user;
    }

    // Delete user
    public function delete(Request $request, $id){
        $status = User::destroy($id);

        return ['deleted' => $status];
    }
}