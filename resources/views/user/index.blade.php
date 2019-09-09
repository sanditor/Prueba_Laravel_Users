@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title m-b-md m-5">
        <div class="text-center">
            <h2>Listado De Usuarios</h2>
        </div>
        <hr />
    </div>
    <div class="row justify-content-center p-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center p-1">Buscador Usuarios</h4>
                <form method="Get" action="{{ route('user.index') }}" id="buscador">
                    @csrf
                    <div class="row p-3">
                    <div class="form-group col-9">
                        <input id="search" type="text" name="search" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="" />
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('name') }}</strong>
                        </span>
                    </div>
                    <div class="form-group col-3 btn-search">
                        <input type="submit" class="btn btn-success" value="Buscar" />
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        @foreach($users as $user)

        <div class="col-sm p-5">
            <div class="card text-center" style="width: 15rem; margin-top: 10px;">
                <div class="card-header">
                    <div class="data-user">
                        {{ $user->name }}
                        <span class="nickname">
                            {{' |  @'.$user->username }}
                        </span>
                    </div>
                    <div class="nickname">
                        Rol: {{ $user->role }}
                    </div>
                </div>
                <div class=" card-body">
                    <img src="{{ asset('img/users.png') }}" alt="users" style="width: 60px;height: 60px">

                </div>
                <p>
                    <a href="{{ route('profile', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Editar Perfil</a>
                    <a href=" {{ route('editHobbies', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Editar Hobbies</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    @endsection
