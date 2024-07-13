<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nuevo()
    {
        $countries = Country::all()->sortBy("nombre");
        $roles = [];

        switch (Auth::user()->role) {
            case "SUPER":
                $roles = [
                    "PARTICIPANTE" => "Participante",
                    "INVESTIGADOR" => "Investigador",
                    "ADMINISTRADOR" => "Administrador"
                ];
                break;

            case "ADMINISTRADOR":
                $roles = [
                    "PARTICIPANTE" => "Participante",
                    "INVESTIGADOR" => "Investigador"
                ];
                break;

            case "INVESTIGADOR":
                $roles = [
                    "PARTICIPANTE" => "Participante"
                ];
                break;
        }

        return view(
            'users.nuevo',
            [
                "countries" => $countries,
                "roles" => $roles
            ]
        );
    }

    public function detalle(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $areas = $proyecto->areas;

        return view('users.detalle', [
            "proyecto" => $proyecto,
            "areas" => $areas
        ]);
    }

    public function users()
    {
        $users = User::all()->sortBy("id");

        return view(
            'users.lista',
            ["users" => $users]
        );
    }

    public function editar(Request $request, string $id)
    {
        $user = User::find($id);
        $countries = Country::all()->sortBy("nombre");

        $roles = [];

        switch (Auth::user()->role) {
            case "SUPER":
                $roles = [
                    "PARTICIPANTE" => "Participante",
                    "INVESTIGADOR" => "Investigador",
                    "ADMINISTRADOR" => "Administrador"
                ];
                break;

            case "ADMINISTRADOR":
                $roles = [
                    "PARTICIPANTE" => "Participante",
                    "INVESTIGADOR" => "Investigador"
                ];
                break;

            case "INVESTIGADOR":
                $roles = [
                    "PARTICIPANTE" => "Participante"
                ];
                break;
        }

        return view(
            'users.editar',
            [
                "user" => $user,
                "countries" => $countries,
                "roles" => $roles
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function crear(Request $request) : RedirectResponse
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make("12345678");
        $user->role = $request->input('role');
        $user->country_id = $request->input('country_id');
        $user->save();

        return redirect('/admin/usuarios');
    }

    public function actualizar(Request $request) : RedirectResponse
    {
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->country_id = $request->input('country_id');
        $user->save();

        return redirect('/admin/usuarios');
    }

    public function ajaxUpdate(Request $request) : Response
    {
        $user = User::find($request->input('idUser'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->country_id = $request->input('idCountry');
        $user->save();

        return response([
            "result" => true
        ]);
    }

    public function ajaxUpdatePassword(Request $request) : Response
    {
        $user = User::find($request->input('idUser'));
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response([
            "result" => true
        ]);
    }
}
