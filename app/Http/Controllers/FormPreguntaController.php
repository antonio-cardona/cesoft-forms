<?php

namespace App\Http\Controllers;

use App\Models\FormPregunta;
use Illuminate\Http\Request;

class FormPreguntaController extends Controller
{
    public function create(Request $request)
    {
        $idForm = $request->input('idForm');
        $preguntasAnswers = $request->input('preguntasAnswers');
        FormPregunta::where("form_id", $idForm)->delete();

        $formPreguntaIds = [];
        foreach ($preguntasAnswers as $answer) {
            $formPregunta = new FormPregunta();
            $formPregunta->form_id = $idForm;
            $formPregunta->pregunta_id = $answer["idPregunta"];
            $formPregunta->respuesta = $answer["answer"];
            $formPregunta->save();

            $formPreguntaIds[] = $formPregunta->id;
        }

        return response([
            "formAreaIds" => $formPreguntaIds,
            "total" => count($formPreguntaIds)
        ]);
    }
}
