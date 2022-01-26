@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1> Administrar Secciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="fs-4">
                <a href="{{ route('admin.section.index') }}">
                    <i class="fas fa-door-open"></i>
                </a> Editando: {{ $section->name }}
            </h1>
            <h6>{{$section->description}}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.section.update') }}">
                @csrf
                <input type="text" name="id" value="{{$section->id}}" hidden>
                <div class="form-group">
                    <label for="name">Nombre nuevo</label>
                    <input type="text" class="form-control" name="name" placeholder="Coloque el nombre" required value="{{$section->name}}">
                </div>
                <button type="submit" class="mt-4 btn btn-primary">Actualizar</button>
            </form>
        </div>
        <x-jet-validation-errors class="mt-4 mb-4" />

    </div>

    <h3>Editar Lecciones</h3>
    @livewire('admin-edit-section',['section_id'=>$section_id])

    <h3>Eliminar</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.section.destroy') }}">
                @csrf
                <label>Escriba "{{$section->id}}" para confirmar eliminacion </label>
                <input type="text" name="id">
                <input type="text" name="ids" hidden value="{{$section->id}}">
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
