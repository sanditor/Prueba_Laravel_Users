<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserAdminSeeder extends Seeder
{
    /**m
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       //tomar los roles
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        //crear usuario Administrador por defecto en BBDD
        $user = new User();
        $user->role = "admin";
        $user->name = "Admin";
        $user->username = "Administrador";
        $user->email = "admin@admin.com";
        $user->city = "Bogota";
        $user->hobbies = "Dormir";
        $user->password = Hash::make('123456');
        $user->save();

        //Relacionar el usuario a rol admin
        $user->roles()->attach($role_admin);

    }
}
