<?php

namespace App\Http\Controllers;

use App\Hobbie;
use Illuminate\Http\Request;

class HobbiesController extends Controller
{
    //Autorizacion usuario autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $hobbies = Hobbie::where("id", "=", $id)
                            ->get();

        return view('hobbies.editHobbies', [
                'hobbies' => $hobbies
        ]);
    }

    public function create()
    {
        return view('hobbies.create');
    }

        public function save(Request $request)
    {

        //Validacion
        $validate = $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        //Recoger datos
        $name = $request->input('name');
        $description = $request->input('description');


        //Asignar valores al nuevo objeto
        $user = \Auth::user();
        $hobbie = new Hobbie();
        $hobbie->user_id = $user->id;
        $hobbie->name = $name;
        $hobbie->description = $description;


        //Guardar Hobbie en BBDD
        $hobbie->save();

        return redirect()->route('home')->with([
            'message' => 'El Hobbie se ha guardado correctamente!!'
        ]);
    }

    //pagina de detalle
    public function detail($id)
    {
        $hobbie = Hobbie::find($id);

        return view('hobbies.detailAdmin', [
            'hobbie' => $hobbie
        ]);
    }

    //editar hobbies user
  /*   public function edit($id)
    {

        $user = \Auth::user();
        $hobbie = Hobbie::find($id);

         //comprobar si el usuario es dueno del hobbie
        if ($user && $hobbie && $hobbie->user->id == $user->id) {
            return view('hobbies.edit', [
                'hobbie' => $hobbie
            ]);
        } else {
            return redirect()->route('home')->with([
                'message'=>'No tienes permisos para editar otros hobbies'
            ]);
        }
     }*/
     //editar hobbies user
     public function editHobbies($id)
    {

        $hobbies = Hobbie::where("user_id", "=", $id)
                  ->get();

        return view('hobbies.editHobbies', [
            'hobbies' => $hobbies
        ]);
    }

    //editar hobbies Administrador
    public function editAdmin($id)
    {
        $hobbie = Hobbie::find($id);

            return view('hobbies.editAdmin', [
                'hobbie' => $hobbie
            ]);
    }

    /* //Actualizar hobbies user
    public function update(Request $request)
    {
        //Validacion
        $validate = $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        //Recoger datos
        $hobbie_id = $request->input('hobbie_id');
        $name = $request->input('name');
        $description = $request->input('description');


        //conseguir objeto en la BBDD
        $hobbie = Hobbie::find($hobbie_id);
        $hobbie->name = $name;
        $hobbie->description = $description;


        //Actualizar Hobbie en BBDD
        $hobbie->update();

        //redireccionar vista
        return redirect()->route('hobbies.detail', ['id' => $hobbie_id ])->with([
            'message' => 'Hobbie actualizado correctamente!!'
        ]);


    } */

    //actualizar hobbies Admin
    public function updateAdmin(Request $request)
    {
        //Validacion
        $validate = $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        //Recoger datos
        $hobbie_id = $request->input('hobbie_id');
        $name = $request->input('name');
        $description = $request->input('description');


        //conseguir objeto en la BBDD
        $hobbie = Hobbie::find($hobbie_id);
        $hobbie->name = $name;
        $hobbie->description = $description;


        //Actualizar Hobbie en BBDD
        $hobbie->update();

        //redireccionar vista
        return redirect()->route('index', ['id' => $hobbie_id ])->with([
            'message' => 'Hobbie actualizado correctamente!!'
        ]);


    }
}
