<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        $form = new Form;
        $form->proyecto_id = $request->input('proyecto_id');
        $form->user_id = $request->input('user_id');
        $form->save();

        return redirect(route("participantes-proyecto", [$form->proyecto_id]));
    }

    public function delete(Request $request, $idForm): RedirectResponse
    {
        $form = Form::find($idForm);
        $proyecto_id = $form->proyecto_id;
        $form->delete();

        return redirect(route("participantes-proyecto", [$proyecto_id]));
    }
}
