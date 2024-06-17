<?php

namespace App\Http\Controllers;

use App\Models\ClassificationData;
use App\Models\ClassificationOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassificationDataController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $classificationData = ClassificationData::all();

        return view('datos-clasificacion.lista', [
            "classificationData" => $classificationData
        ]);
    }

    public function crear(Request $request): RedirectResponse
    {
        $classificationData = new ClassificationData;
        $classificationData->nombre = $request->input('nombre');
        $classificationData->save();

        return redirect(route("lista-datos-clasificacion"));
    }

    public function editar(Request $request, string $id)
    {
        $classificationData = ClassificationData::find($id);

        return view(
            'datos-clasificacion.editar',
            [
                "classificationData" => $classificationData
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizar(Request $request): RedirectResponse
    {
        $classificationData = ClassificationData::find($request->input('id'));
        $classificationData->nombre = $request->input('nombre');
        $classificationData->save();

        return redirect(route("lista-datos-clasificacion"));
    }

    public function options(Request $request, string $idClassificationData)
    {
        $classificationData = ClassificationData::find($idClassificationData);
        $options = $classificationData->options;

        return view('datos-clasificacion.options', [
            "options" => $options,
            "classificationData" => $classificationData
        ]);
    }

    public function createOption(Request $request): RedirectResponse
    {
        $classificationOption = new ClassificationOption;
        $classificationOption->texto = $request->input('texto');
        $classificationOption->orden = $request->input('orden');
        $classificationOption->classification_data_id = $request->input('classification_data_id');
        $classificationOption->save();

        return redirect(route("options-dato-clasificacion", [$classificationOption->classification_data_id]));
    }

    public function editOption(Request $request, string $id)
    {
        $classificationOption = ClassificationOption::find($id);
        $classificationData = $classificationOption->classificationData;

        return view(
            'datos-clasificacion.edit-option',
            [
                "classificationOption" => $classificationOption,
                "classificationData" => $classificationData
            ]
        );
    }

    public function updateOption(Request $request): RedirectResponse
    {
        $classificationOption = ClassificationOption::find($request->input('id'));
        $classificationOption->texto = $request->input('texto');
        $classificationOption->orden = $request->input('orden');
        $classificationOption->save();

        return redirect(route("options-dato-clasificacion", [$classificationOption->classification_data_id]));
    }
}
