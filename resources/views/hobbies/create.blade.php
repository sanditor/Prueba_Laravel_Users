@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center p-5">
        <div class="col-md-6 m-5">

            <div class="card">
                <div class="card-header text-center"><h4>Hobbie</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{route('hobbies.save')}}" enctype="multipart/form-data" class="">
                        @csrf

                        <div class="form-group row">
                            <label for='name' class="col-md-3 col-form-label text-md-right">Titulo:</label>
                            <div class="col-md-7">
                                <input id="name" type="text" name="name" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" />
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('name') }}</strong>
                                </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for='description' class="col-md-3 col-form-label text-md-right">Descripción:</label>
                            <div class="col-md-7">
                                <textarea id="description" type="file" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('description') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Guardar" />

                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    @endsection
