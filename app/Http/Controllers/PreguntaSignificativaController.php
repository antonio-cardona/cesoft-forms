<?php

namespace App\Http\Controllers;

use App\Models\AreaNivelSuperior;
use App\Models\PreguntaSignificativa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PreguntaSignificativaController extends Controller
{
    public function crear(Request $request): RedirectResponse
    {
        $pregunta = new PreguntaSignificativa;
        $pregunta->texto = $request->input('texto');
        $pregunta->orden = 45;
        $pregunta->area_nivel_superior_id = $request->input('area_nivel_superior_id');
        $pregunta->save();

        return redirect("/admin/preguntas/{$pregunta->area_nivel_superior_id}");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function preguntas(Request $request, string $id)
    {
        $area = AreaNivelSuperior::find($id);

        return view('preguntas.lista', [
            "proyecto" => $area->proyecto,
            "area" => $area,
            "preguntas" => $area->preguntas
        ]);
    }
}
