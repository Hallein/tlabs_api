<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tema;

class TemasController extends Controller
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

    // Delete tema
    public function delete(Request $request, $id){
        $status = Tema::destroy($id);

        return ['deleted' => $status];
    }
}

