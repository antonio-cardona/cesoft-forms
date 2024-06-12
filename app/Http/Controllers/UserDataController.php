<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function perfil()
    {
        $paises = Country::all()->sortBy("nombre");
        $ciudades = $paises->first()->cities->sortBy("nombre");

        return view(
            'users.perfil',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function miFormulario() {
        $paises = Country::all()->sortBy("nombre");
        $ciudades = $paises->first()->cities->sortBy("nombre");

        return view(
            'users.mi-formulario',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function miFormularioPaso2() {
        $paises = Country::all()->sortBy("nombre");
        $ciudades = $paises->first()->cities->sortBy("nombre");

        return view(
            'users.mi-formulario-paso-2',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function miFormularioPaso3() {
        $paises = Country::all()->sortBy("nombre");
        $ciudades = $paises->first()->cities->sortBy("nombre");

        return view(
            'users.mi-formulario-paso-3',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }


}






