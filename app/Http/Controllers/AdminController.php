<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
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
        $proyectos = Proyecto::all()->sortBy("id");

        return view(
            'admin.proyectos',
            ["proyectos" => $proyectos]
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
