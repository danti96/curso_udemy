<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    //Para asignar los permisos a los diferentes metodos
    public function __construct()
    {
        $this->middleware('can:Leer Usuario')->only('index');
        $this->middleware('can:Editar Usuario')->only('edit','update');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        /**
         * Acceder al registro del usuario y recuperar la relación roles
         * Pido que me sincronice con los roles que estoyt mandando por
         * el formulario.
         **/
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user);
    }

}
