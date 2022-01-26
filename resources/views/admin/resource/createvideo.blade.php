@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1><a href="{{route('admin.resource.index')}}"><i class="fas fa-door-open"></i></a> Crear recurso Video</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('admin.resource.storeimage')}}">
            @csrf
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name"  placeholder="Coloque el nombre" required>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" class="form-control" name="url"  placeholder="Coloque el URL" required>
            </div>
            <div class="form-group">
                <label for="iframe">Iframe</label>
                <input type="text" class="form-control" name="iframe"  placeholder="Coloque el iframe aca" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <x-jet-validation-errors class="mt-4 mb-4" />
          </form>
    </div>
</div>


@stop

@section('css')

@stop

@section('js')
  <script>console.log('Hi');</script>
@stop
