<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class UserDataController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function perfil()
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

    public function miFormulario() {
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

    public function miFormularioPaso2() {
        $paises = Pais::all()->sortBy("nombre");
        $ciudades = $paises->first()->ciudades->sortBy("nombre");

        return view(
            'users.mi-formulario-paso-2',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function miFormularioPaso3() {
        $paises = Pais::all()->sortBy("nombre");
        $ciudades = $paises->first()->ciudades->sortBy("nombre");

        return view(
            'users.mi-formulario-paso-3',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }
}
