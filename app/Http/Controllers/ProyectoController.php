<?php

namespace App\Http\Controllers;

use App\Models\ClassificationData;
use App\Models\Proyecto;
use App\Models\ProyectoClassificationData;
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

    public function prePublicar(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        return view(
            'proyectos.pre-publicar',
            ["proyecto" => $proyecto]
        );
    }

    public function datosClasificacion(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $classificationData = ClassificationData::all();
        $cData = [];

        foreach ($classificationData as $tempData) {
            $cData[] = (object) [
                "id" => $tempData->id,
                "nombre" => $tempData->nombre,
                "options" => $tempData->options,
            ];
        }

        return view(
            'proyectos.datos-clasificacion',
            [
                "proyecto" => $proyecto,
                "cData" => $cData
            ]
        );
    }

    public function saveDatosClasificacion(Request $request)
    {
        $idProyecto = $request->input('idProyecto');
        $classificationData = $request->input('clasificacion');

        foreach ($classificationData as $cData) {
            $proyectoCData = new ProyectoClassificationData;
            $proyectoCData->proyecto_id = $idProyecto;
            $proyectoCData->classification_data_id = $cData['id'];
            $proyectoCData->orden = $cData['orden'];
            $proyectoCData->save();
        }

        return response([
            "errors" => "NO",
            "result" => $proyectoCData
        ]);
    }
}
