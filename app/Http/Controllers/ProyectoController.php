<?php

namespace App\Http\Controllers;

use App\Models\ClassificationData;
use App\Models\Proyecto;
use App\Models\ProyectoClassificationData;
use App\Models\ProyectoIdentificationData;
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
        $identificationData = [
            (object) [
                "id" => "DOC",
                "nombre" => "Documento de Identidad"
            ],
            (object) [
                "id" => "CEL",
                "nombre" => "Número de Celular"
            ]
        ];

        $proyectoClassificationData = ProyectoClassificationData::where("proyecto_id", $id)->orderBy("orden", "ASC")->get();
        $proyectoIdentificationData = ProyectoIdentificationData::where("proyecto_id", $id)->orderBy("orden", "ASC")->get();

        $idData = [];
        $idDataSelected = [];
        foreach ($identificationData as $tempIdData) {
            $data = (object) [
                "id" => $tempIdData->id,
                "nombre" => $tempIdData->nombre
            ];

            // Verificamos si este idData esta en la lista de los proyectoIdData:
            $selected = false;
            foreach ($proyectoIdentificationData as $tempProyIdData) {
                if ($tempIdData->id == $tempProyIdData->identification_data_id) {
                    $data->orden = $tempProyIdData->orden;
                    $selected = true;
                    break;
                }
            }

            if ($selected) {
                $idDataSelected[] = $data;
            }
            else {
                $idData[] = $data;
            }
        }

        $cData = [];
        $cDataSelected = [];
        foreach ($classificationData as $tempClData) {
            $data = (object) [
                "id" => $tempClData->id,
                "nombre" => $tempClData->nombre
            ];

            // Verificamos si este cData esta en la lista de los proyectoCData:
            $selected = false;
            foreach ($proyectoClassificationData as $tempProyClData) {
                if ($tempClData->id == $tempProyClData->classification_data_id) {
                    $data->orden = $tempProyClData->orden;
                    $selected = true;
                    break;
                }
            }

            if ($selected) {
                $cDataSelected[] = $data;
            }
            else {
                $cData[] = $data;
            }
        }

        $comparator = function ($object1, $object2) {
            return $object1->orden > $object2->orden;
        };

        usort($cDataSelected, $comparator);

        return view(
            'proyectos.datos-clasificacion',
            [
                "proyecto" => $proyecto,
                "idData" => $idData,
                "idDataSelected" => $idDataSelected,
                "cData" => $cData,
                "cDataSelected" => $cDataSelected,
                "totalId" => count($idData) + count($idDataSelected),
                "totalCl" => count($cData) + count($cDataSelected)
            ]
        );
    }

    public function saveDatosClasificacion(Request $request)
    {
        $idProyecto = $request->input('idProyecto');
        $identificationData = $request->input('identification');
        $classificationData = $request->input('classification');

        ProyectoIdentificationData::where("proyecto_id", $idProyecto)->delete();
        ProyectoClassificationData::where("proyecto_id", $idProyecto)->delete();

        foreach ($identificationData as $idData) {
            $proyectoIdData = new ProyectoIdentificationData;
            $proyectoIdData->proyecto_id = $idProyecto;
            $proyectoIdData->identification_data_id = $idData['id'];
            $proyectoIdData->orden = $idData['orden'];
            $proyectoIdData->save();
        }

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
