<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('users.nuevo');
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

        return view('users.detalle', [
            "proyecto" => $proyecto,
            "areas" => $areas
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $users = User::all()->sortBy("id");

        return view(
            'users.lista',
            ["users" => $users]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editar(Request $request, string $id)
    {
        $user = User::find($id);

        return view(
            'users.editar',
            ["user" => $user]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function crear(Request $request): RedirectResponse
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //$user->password = Hash::make($request->input('password'));
        $user->password = Hash::make("12345678");
        $user->role = $request->input('role');
        $user->save();

        return redirect('/admin/usuarios');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizar(Request $request): RedirectResponse
    {
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //$user->password = Hash::make($request->input('password'));
        //$user->password = Hash::make("12345678");
        $user->role = $request->input('role');
        $user->save();

        return redirect('/admin/usuarios');
    }
}
