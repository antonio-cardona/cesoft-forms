<?php

namespace App\Http\Controllers;

use App\Models\ClassificationData;
use App\Models\Form;
use App\Models\Proyecto;
use App\Models\ProyectoClassificationData;
use App\Models\ProyectoIdentificationData;
use App\Models\ProyectoResearcher;
use App\Models\User;
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
        $researchers = User::where("role", "INVESTIGADOR")->orderBy("name")->get();

        return view('proyectos.nuevo', [
            "researchers" => $researchers
        ]);
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
            'proyecto' => $proyecto,
            'areas' => $areas,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proyectos()
    {
        $proyectos = Proyecto::all()->sortBy('id');

        return view('proyectos.lista', ['proyectos' => $proyectos]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editar(Request $request, string $idProyecto)
    {
        $proyecto = Proyecto::find($idProyecto);
        $researchers = User::where("role", "INVESTIGADOR")->orderBy("name")->get();
        $proyResearcher = ProyectoResearcher::where("proyecto_id", $idProyecto)->with("user")->first();

        $idProyectoResearcher = "";
        $idCurrentResearcher = "";
        if ($proyResearcher) {
            $idProyectoResearcher = $proyResearcher->id;
            $idCurrentResearcher = $proyResearcher->user->id;
        }

        return view('proyectos.editar', [
            "proyecto" => $proyecto,
            "researchers" => $researchers,
            "idProyectoResearcher" => $idProyectoResearcher,
            "idCurrentResearcher" => $idCurrentResearcher
        ]);
    }

    public function crear(Request $request) : RedirectResponse
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->input('nombre');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->fecha_final = $request->input('fecha_final');
        $proyecto->objetivo = $request->input('objetivo');
        $proyecto->save();

        $idResearcher = $request->input('researcher_id');
        if ($idResearcher) {
            $proyectoResearcher = new ProyectoResearcher();
            $proyectoResearcher->proyecto_id = $proyecto->id;
            $proyectoResearcher->user_id = $idResearcher;
            $proyectoResearcher->save();
        }

        return redirect(route("lista-proyectos"));
    }

    public function actualizar(Request $request) : RedirectResponse
    {
        $proyecto = Proyecto::find($request->input('id'));
        $proyecto->nombre = $request->input('nombre');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->fecha_final = $request->input('fecha_final');
        $proyecto->objetivo = $request->input('objetivo');
        $proyecto->save();

        $idProyectoResearcher = $request->input('id_proyecto_researcher');
        $idResearcher = $request->input('researcher_id');
        if ($idProyectoResearcher) {
            if ($idResearcher && $idResearcher != "0") {
                $proyectoResearcher = ProyectoResearcher::find($idProyectoResearcher);
                $proyectoResearcher->user_id = $idResearcher;
                $proyectoResearcher->save();
            } else {
                ProyectoResearcher::find($idProyectoResearcher)->delete();
            }
        } else if ($idResearcher && $idResearcher != "0") {
            $proyectoResearcher = new ProyectoResearcher();
            $proyectoResearcher->proyecto_id = $proyecto->id;
            $proyectoResearcher->user_id = $idResearcher;
            $proyectoResearcher->save();
        }

        return redirect(route("lista-proyectos"));
    }

    public function publicar(Request $request, string $idProyecto)
    {
        $proyecto = Proyecto::find($idProyecto);
        $proyecto->status = 'PUBLICADO';
        $proyecto->save();

        return redirect(route('lista-proyectos'));
    }

    public function desPublicar(Request $request, string $idProyecto)
    {
        $proyecto = Proyecto::find($idProyecto);
        $proyecto->status = 'SIN-PUBLICAR';
        $proyecto->save();

        return redirect(route('lista-proyectos'));
    }

    public function datosClasificacion(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        $classificationData = ClassificationData::all();
        $identificationData = [
            (object) [
                'id' => 'DOC',
                'nombre' => 'Documento de Identidad',
            ],
            (object) [
                'id' => 'CEL',
                'nombre' => 'Número de Celular',
            ],
        ];

        $proyectoClassificationData = ProyectoClassificationData::where('proyecto_id', $id)->orderBy('orden', 'ASC')->get();
        $proyectoIdentificationData = ProyectoIdentificationData::where('proyecto_id', $id)->orderBy('orden', 'ASC')->get();

        $idData = [];
        $idDataSelected = [];
        foreach ($identificationData as $tempIdData) {
            $data = (object) [
                'id' => $tempIdData->id,
                'nombre' => $tempIdData->nombre,
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
            } else {
                $idData[] = $data;
            }
        }

        $cData = [];
        $cDataSelected = [];
        foreach ($classificationData as $tempClData) {
            $data = (object) [
                'id' => $tempClData->id,
                'nombre' => $tempClData->nombre,
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
            } else {
                $cData[] = $data;
            }
        }

        $comparator = function ($object1, $object2) {
            return $object1->orden > $object2->orden;
        };

        usort($cDataSelected, $comparator);

        return view('proyectos.datos-clasificacion', [
            'proyecto' => $proyecto,
            'idData' => $idData,
            'idDataSelected' => $idDataSelected,
            'cData' => $cData,
            'cDataSelected' => $cDataSelected,
            'totalId' => count($idData) + count($idDataSelected),
            'totalCl' => count($cData) + count($cDataSelected),
        ]);
    }

    public function saveDatosClasificacion(Request $request)
    {
        $idProyecto = $request->input('idProyecto');
        $identificationData = $request->input('identification');
        $classificationData = $request->input('classification');

        ProyectoIdentificationData::where('proyecto_id', $idProyecto)->delete();
        ProyectoClassificationData::where('proyecto_id', $idProyecto)->delete();

        foreach ($identificationData as $idData) {
            $proyectoIdData = new ProyectoIdentificationData();
            $proyectoIdData->proyecto_id = $idProyecto;
            $proyectoIdData->identification_data_id = $idData['id'];
            $proyectoIdData->orden = $idData['orden'];
            $proyectoIdData->save();
        }

        foreach ($classificationData as $cData) {
            $proyectoCData = new ProyectoClassificationData();
            $proyectoCData->proyecto_id = $idProyecto;
            $proyectoCData->classification_data_id = $cData['id'];
            $proyectoCData->orden = $cData['orden'];
            $proyectoCData->save();
        }

        return response([
            'errors' => 'NO',
            'result' => $proyectoCData,
        ]);
    }

    public function participantes(Request $request, string $idProyecto)
    {
        $proyecto = Proyecto::find($idProyecto);

        $participantesProyecto = Form::whereBelongsTo($proyecto)->get();
        $idsNoDisponibles = [];
        foreach ($participantesProyecto as $form) {
            $idsNoDisponibles[] = $form->user->id;
        }

        $participantesDisponibles = User::where('role', 'PARTICIPANTE')->orderBy('name')->get()->except($idsNoDisponibles);

        return view('proyectos.participantes', [
            'proyecto' => $proyecto,
            'participantesProyecto' => $participantesProyecto,
            'participantesDisponibles' => $participantesDisponibles,
        ]);
    }

    public function delete(Request $request, string $idProyecto): RedirectResponse
    {
        $proyecto = Proyecto::find($idProyecto);
        $proyecto->deleteAreas();
        $proyecto->delete();

        return redirect(route("lista-proyectos"));
    }
}
