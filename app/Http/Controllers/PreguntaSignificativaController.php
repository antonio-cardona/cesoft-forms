<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Pregunta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PreguntaSignificativaController extends Controller
{
    public function crear(Request $request): RedirectResponse
    {
        $pregunta = new Pregunta;
        $pregunta->texto = $request->input('texto');
        $pregunta->orden = 45;
        $pregunta->area_id = $request->input('area_nivel_superior_id');
        $pregunta->save();

        return redirect("/admin/preguntas/{$pregunta->area_id}");
    }

    public function preguntas(Request $request, string $idArea)
    {

        $area = Area::find($idArea);
        return view('preguntas.lista', [
            "proyecto" => $area->proyecto,
            "area" => $area,
            "preguntas" => $area->preguntas
        ]);
    }

    public function editar(Request $request, string $id)
    {
        $pregunta = Pregunta::find($id);
        $area = $pregunta->area;

        return view(
            'preguntas.editar',
            [
                "pregunta" => $pregunta,
                "area" => $area,
                "proyecto" => $area->proyecto
            ]
        );
    }

    public function actualizar(Request $request): RedirectResponse
    {
        $pregunta = Pregunta::find($request->input('id'));
        $pregunta->texto = $request->input('texto');
        $pregunta->save();

        return redirect("/admin/preguntas/{$pregunta->area->id}");
    }
}
