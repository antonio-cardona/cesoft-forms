<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'user-data.perfil',
            [
                "paises" => $paises,
                "ciudades" => $ciudades
            ]
        );
    }

    public function myForms()
    {
        //$paises = Country::all()->sortBy("nombre");
        //$ciudades = $paises->first()->cities->sortBy("nombre");
        $user = Auth::user();

        $forms = Form::whereBelongsTo($user)->get();


        return view(
            'user-data.mis-formularios',
            [
                "paises" => [],
                "ciudades" => [],
                "forms" => $forms
            ]
        );
    }

    public function stepOne()
    {
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

    public function miFormularioPaso3()
    {
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






