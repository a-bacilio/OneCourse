@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1><a href="{{route('admin.lesson.index')}}"><i class="fas fa-door-open"></i></a> Crear lección</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.lesson.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Coloque el nombre" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Descripción</span>
                    <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                  </div>
                <button type="submit" class="mt-4 btn btn-primary">Crear</button>
            </form>
            <x-jet-validation-errors class="mt-4 mb-4" />
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
