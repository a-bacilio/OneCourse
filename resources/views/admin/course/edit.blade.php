@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1> Administrar Secciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="fs-4">
                Editando: {{ $course->name }}
            </h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.course.update') }}">
                @csrf
                <input type="text" name="id" value="{{$course->id}}" hidden>
                <div class="form-group">
                    <label for="name">Nombre nuevo</label>
                    <input type="text" class="form-control" name="name" placeholder="Coloque el nombre" required value="{{$course->name}}">
                </div>
                <button type="submit" class="mt-4 btn btn-primary">Actualizar</button>
            </form>
        </div>
        <x-jet-validation-errors class="mt-4 mb-4" />

    </div>

    <h3>Editar Secciones</h3>
    @livewire('admin-edit-course',['course_id'=>$course_id])

@stop

@section('css')
@stop

@section('js')
    <script src="//unpkg.com/alpinejs" defer></script>
@stop
