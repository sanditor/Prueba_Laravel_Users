@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-5">
            <div class="card text-center" st>
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
                    <a href="{{ route('hobbies.edit', ['id' => $hobbie->id])  }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
