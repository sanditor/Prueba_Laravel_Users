<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class RegistroController extends Controller
{

    //Autorizacion usuario autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('user.createRegister');
    }

    public function create(Request $request){



        //Validacion
        $validate = $this->validate($request, [
            'role' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'city' => 'required|string|max:255',
            'hobbies' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        //Recoger datos
        $role = $request->input('role');
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $city = $request->input('city');
        $hobbies = $request->input('hobbies');
        $password = $request->input('password');

         //Asignar valores al nuevo objeto
         $users = new User();
         $users->role = $role;
         $users->name = $name;
         $users->username = $username;
         $users->email = $email;
         $users->city = $city;
         $users->hobbies = $hobbies;
         $users->password = Hash::make($password);

         //Guardar Hobbie en BBDD
        $users->save();
        if($role == 'Admin') {
            $users
            ->roles()
            ->attach(Role::where('name', 'admin')->first());
        }elseif($role == 'User'){
            $users
            ->roles()
            ->attach(Role::where('name', 'user')->first());
        }else{

        }

        return redirect()->route('home')->with([
            'message' => 'El Registro de Usuario se ha guardado correctamente!!'
        ]);

    }
}
