<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Hobbie;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($search=null,Request $request)
    {
        $request->user()->authorizeRoles('admin');
        if(!empty($search)) {
            $users = User::where('name','LIKE','%'.$search.'%')
                                    ->orwhere('username','LIKE','%'.$search.'%')
                                    ->orderBy('id', 'desc')->get();
        }else{
            $users = User::orderBy('id', 'desc')->get();
        }


        return view('user.index', [
            'users' => $users
        ]);
    }

    public function config(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('user.config');
    }



    public function update(Request $request)
    {
        //conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //validacion del Formulario
        $validate = $this->validate($request, [
            'role' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'hobbies' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed']

        ]);

        //recoger los datos del formulario
        $role = $request->input('role');
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $city = $request->input('city');
        $hobbies = $request->input('hobbies');
        $password = $request->input('password');


        //Asignar nuevos valores al objeto del usuario
        $user->role = $role;
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->city =  $city;
        $user->hobbies = $hobbies;
        $user->password = Hash::make($password);


        //Ejecutar consulta y cambios de datos

        $user->update();

        return redirect()->route('config')
            ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function profile($id)
    {

        $users = User::find($id);
        return view('user.profile', [
            'users' => $users

        ]);
    }


}
