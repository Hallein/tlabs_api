<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class AuthController extends Controller
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

    //
    public function login(Request $request){
        // Body params
        $username = $request->input('username');
        $password = $request->input('password');

        // Find username in BD
        $user = User::where('username', $username)->first();
        if(!$user){
            // El usuario no existe
            return ['status' => 'error', 'message' => 'Credenciales incorrectas'];
        }

        $isPasswordCorrect = Hash::check($password, $user->password);
        if(!$isPasswordCorrect){
            // La password es incorrecta
            return ['status' => 'error', 'message' => 'Credenciales incorrectas'];
        }

        // Generate JWT
        // TODO
        $token = 'aklsjdlkjaskldjw';

        return ["status" => 'success', 'token' => $token];
    }
}