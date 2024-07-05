<?php

namespace App\Http\Controllers;

use App\Models\FormProyectoClassificationData;
use Illuminate\Http\Request;

class FormProyectoClassificationDataController extends Controller
{
    public function create(Request $request)
    {
        $idForm = $request->input('idForm');
        $classificationDataAnswers = $request->input('classificationDataAnswers');
        FormProyectoClassificationData::where("form_id", $idForm)->delete();

        $formClsDataIds = [];
        foreach ($classificationDataAnswers as $answer) {
            $formPregunta = new FormProyectoClassificationData();
            $formPregunta->form_id = $idForm;
            $formPregunta->proyecto_classification_data_id = $answer["idProyectoClassificationData"];
            $formPregunta->classification_option_id = $answer["selectedIdOption"];
            $formPregunta->save();

            $formClsDataIds[] = $formPregunta->id;
        }

        return response([
            "formClsDataIds" => $formClsDataIds,
            "total" => count($formClsDataIds)
        ]);
    }
}
