<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proyectos()
    {
        $paises = Pais::all()->sortBy("nombre");
        $ciudades = $paises->first()->ciudades->sortBy("nombre");

        return view(
            'users.perfil',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function formularios() {
        $paises = Pais::all()->sortBy("nombre");
        $ciudades = $paises->first()->ciudades->sortBy("nombre");

        return view(
            'users.mi-formulario',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function usuarios() {
        $paises = Pais::all()->sortBy("nombre");
        $ciudades = $paises->first()->ciudades->sortBy("nombre");

        return view(
            'users.mi-formulario',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }
}
