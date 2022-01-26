@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1> Administrar Lecciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="fs-4">
                <a href="{{ route('admin.lesson.index') }}">
                    <i class="fas fa-door-open"></i>
                </a> Editando: {{ $lesson->name }}
            </h1>
            <h6>{{$lesson->description}}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.lesson.update') }}">
                @csrf
                <input type="text" name="id" value="{{$lesson->id}}" hidden>
                <div class="form-group">
                    <label for="name">Nombre nuevo</label>
                    <input type="text" class="form-control" name="name" placeholder="Coloque el nombre" required value="{{$lesson->name}}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Descripción nueva</span>
                    <textarea class="form-control" name="description" aria-label="With textarea">{{$lesson->description}}</textarea>
                </div>
                <button type="submit" class="mt-4 btn btn-primary">Actualizar</button>
            </form>
        </div>
        <x-jet-validation-errors class="mt-4 mb-4" />

    </div>

    <h3>Editar recursos</h3>
    @livewire('admin-edit-lesson',['lesson_id'=>$lesson_id])

    <h3>Eliminar</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.lesson.destroy') }}">
                @csrf
                <label>Escriba "{{$lesson->id}}" para confirmar eliminacion </label>
                <input type="text" name="id">
                <input type="text" name="ids" hidden value="{{$lesson->id}}">
                <br>
                <button type="submit" class="mt-4 btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')
    <script src="//unpkg.com/alpinejs" defer></script>
@stop
