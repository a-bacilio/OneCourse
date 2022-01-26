@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1><a href="{{route('admin.section.index')}}"><i class="fas fa-door-open"></i></a> Crear referencia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.reference.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Colocar la referencia</label>
                    <input type="text" class="form-control" name="value" placeholder="Referencia" required>
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
