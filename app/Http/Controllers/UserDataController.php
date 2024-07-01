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

    public function formAreas(Request $request, string $idForm)
    {
        $form = Form::find($idForm);

        $proyectoAreas = $form->proyecto->areas;

        $availableAreas = [];
        $selectedAreas = [];
        foreach ($proyectoAreas as $tempArea) {
            $data = (object) [
                'id' => $tempArea->id,
                'nombre' => $tempArea->nombre,
            ];

            // Verificamos si esta area está en la lista de los formArea:
            $selected = false;
            foreach ($form->formAreas as $tempFormArea) {
                if ($tempArea->id == $tempFormArea->area_id) {
                    $data->orden = $tempFormArea->orden;
                    $selected = true;
                    break;
                }
            }

            if ($selected) {
                $selectedAreas[$data->orden] = $data;
            } else {
                $availableAreas[] = $data;
            }
        }

        return view(
            'user-data.form.areas',
            [
                "form" => $form,
                "proyecto" => $form->proyecto,
                "selectedAreas" => $selectedAreas,
                "availableAreas" => $availableAreas,
                'totalAreas' => count($selectedAreas) + count($availableAreas),
            ]
        );
    }

    public function formPreguntas(Request $request, string $idForm)
    {
        $form = Form::find($idForm);

        // Se obtiene el Area de orden 1 seleccionada por el Participante.
        //$firstFormArea = $form->areas->where("orden", 1)->first();
        $firstFormArea = $form->areas->first();

        // Se obtienen las preguntas correspondientes al Area
        $preguntas = $firstFormArea->preguntas;

        return view(
            'user-data.form.preguntas',
            [
                "form" => $form,
                "proyecto" => $form->proyecto,
                "area" => $firstFormArea,
                "preguntas" => $preguntas
            ]
        );
    }

}






