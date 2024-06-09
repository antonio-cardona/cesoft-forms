<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nuevo()
    {
        return view('proyectos.nuevo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detalle(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $areas = $proyecto->areas;

        return view('proyectos.detalle', [
            "proyecto" => $proyecto,
            "areas" => $areas
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proyectos()
    {
        $proyectos = Proyecto::all()->sortBy("id");

        return view(
            'proyectos.lista',
            ["proyectos" => $proyectos]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editar(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        return view(
            'proyectos.editar',
            ["proyecto" => $proyecto]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function crear(Request $request): RedirectResponse
    {
        $proyecto = new Proyecto;
        $proyecto->nombre = $request->input('nombre');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->save();

        return redirect('/admin/proyectos');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizar(Request $request): RedirectResponse
    {
        $proyecto = Proyecto::find($request->input('id'));
        $proyecto->nombre = $request->input('nombre');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->save();

        return redirect('/admin/proyectos');
    }
}
