@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1><a href="{{route('admin.section.index')}}"><i class="fas fa-door-open"></i></a> Editar Credito a:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.credit.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Colocar la persona</label>
                    <input type="text" class="form-control" name="name" value="{{$credit->name}}" placeholder="Pregunta" required>
                </div>
                <div class="form-group">
                    <label for="role">Colocar el rol de la persona</label>
                    <input type="text" class="form-control" name="role" value="{{$credit->role}}" placeholder="Pregunta" required>
                </div>
                <div class="form-group">
                    <label for="description">Colocar una descripcion</label>
                    <input type="text" class="form-control" name="description" value="{{$credit->description}}" placeholder="Pregunta" required>
                </div>
                <img style="width:50px;height:50px;" src="{{asset($credit->picture)}}"  alt="{{$credit->name}}">
                <div class="form-group">
                    <label for="picture">Colocar una foto</label>
                    <input type="file" class="form-control-file" name="picture" placeholder="Seleccione una imagen de perfil"
                        accept="image/png, image/gif, image/jpeg, image/jpg, image/svg" required>
                </div>
                <button type="submit" class="mt-4 btn btn-primary">Guardar</button>
            </form>
            <x-jet-validation-errors class="mt-4 mb-4" />
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
