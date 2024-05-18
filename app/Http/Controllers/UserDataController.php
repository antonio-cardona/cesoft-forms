<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class UserDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function basic()
    {
        $paises = Pais::all()->sortBy("nombre");
        $ciudades = $paises->first()->ciudades->sortBy("nombre");

        return view(
            'user-data.basic',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }
}
