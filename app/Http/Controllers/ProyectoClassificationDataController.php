<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoClassificationDataController extends Controller
{
    public function crear(Request $request): RedirectResponse
    {
        $classificationData = new ClassificationData;
        $classificationData->nombre = $request->input('nombre');
        $classificationData->save();

        return redirect(route("lista-datos-clasificacion"));
    }
}
