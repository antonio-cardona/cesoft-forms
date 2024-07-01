<?php

namespace App\Http\Controllers;

use App\Models\FormArea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormAreaController extends Controller
{
    public function create(Request $request)
    {
        $idForm = $request->input('idForm');
        $selectedAreas = $request->input('areas');
        FormArea::where("form_id", $idForm)->delete();

        $formAreaIds = [];
        foreach ($selectedAreas as $area) {
            $formArea = new FormArea();
            $formArea->form_id = $idForm;
            $formArea->area_id = $area["id"];
            $formArea->orden = $area["orden"];
            $formArea->save();

            $formAreaIds[] = $formArea->id;
        }

        return response([
            "formAreaIds" => $formAreaIds,
            "total" => count($formAreaIds)
        ]);
    }
}
