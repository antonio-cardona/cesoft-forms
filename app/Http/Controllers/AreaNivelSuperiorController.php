<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Proyecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AreaNivelSuperiorController extends Controller
{
    public function crear(Request $request): RedirectResponse
    {
        $area = new Area;
        $area->nombre = $request->input('nombre');
        $area->proyecto_id = $request->input('proyecto_id');
        $area->save();

        return redirect("/admin/areas/{$area->proyecto_id}");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function areas(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $areas = $proyecto->areas;

        return view('areas.lista', [
            "proyecto" => $proyecto,
            "areas" => $areas,
            "totalAreas" => count($areas)
        ]);
    }

    public function editar(Request $request, string $id)
    {
        $area = Area::find($id);
        $proyecto = $area->proyecto;

        return view(
            'areas.editar',
            [
                "area" => $area,
                "proyecto" => $proyecto
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
        $area = Area::find($request->input('id'));
        $area->nombre = $request->input('nombre');
        $area->save();

        return redirect("/admin/areas/{$area->proyecto->id}");
    }
}
