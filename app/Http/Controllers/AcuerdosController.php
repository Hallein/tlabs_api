<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Acuerdo;

class AcuerdosController extends Controller
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

    // Delete acuerdo
    public function delete(Request $request, $id){
        $status = Acuerdo::destroy($id);

        return ['deleted' => $status];
    }
}

