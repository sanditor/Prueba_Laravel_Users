@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title m-b-md m-5">
        <div class="text-center">
            <h2>Listado De Hobbies Usuario</h2>
            <hr/>
        </div>
        @include('includes.message')
    </div>
    <div class="row">
        @foreach($hobbies as $hobbie)
        <div class="col-sm p-3">
            <div class="card text-center" style="width: 15rem; margin-top: 10px;">
                <div class="card-header">
                    <div class="data-user">
                        {{ $hobbie->user->name }}
                        <span class="nickname">
                            {{' |  @'.$hobbie->user->username }}
                        </span>
                    </div>
                    <img src="{{ asset('img/hobby.png') }}" alt="hobbie" style="width: 40px;height: 40px">
                </div>
                <div class=" card-body">
                    <h4 class="card-title" style="font-weight: bold">{{$hobbie->name}}</h4>
                    <p class="card-text">{{$hobbie->description}}</p>
                    <a href="{{ route('hobbies.detailAdmin', ['id'=> $hobbie->id]) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
