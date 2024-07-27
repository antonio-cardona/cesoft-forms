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

        return redirect(route("lista-preguntas", [$pregunta->area->id]));
    }

    public function preguntas(Request $request, string $idArea)
    {
        $area = Area::find($idArea);
        return view('preguntas.lista', [
            "proyecto" => $area->proyecto,
            "area" => $area,
            "preguntas" => $area->preguntas,
            "totalPreguntas" => count($area->preguntas)
        ]);
    }

    public function editar(Request $request, string $idPregunta)
    {
        $pregunta = Pregunta::find($idPregunta);
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

        return redirect(route("lista-preguntas", [$pregunta->area->id]));
    }

    public function delete(Request $request, string $idPregunta): RedirectResponse
    {
        $pregunta = Pregunta::find($idPregunta);
        $idArea = $pregunta->area->id;
        $pregunta->delete();

        return redirect(route("lista-preguntas", [$idArea]));
    }
}
