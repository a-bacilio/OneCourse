@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1><a href="{{route('admin.resource.index')}}"><i class="fas fa-door-open"></i></a> Crear recurso Imagen</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.resource.storeimage') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Coloque el nombre" required>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control-file" name="image" placeholder="Seleccione una imagen"
                        accept="image/png, image/gif, image/jpeg, image/jpg, image/svg" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <x-jet-validation-errors class="mt-4 mb-4" />
        </div>
    </div>


@stop

@section('css')

@stop

@section('js')

@stop
