@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
  <h1> Administrar Secciones del curso</h1>
@stop

@section('content')
@livewire('admin-section')


@stop

@section('css')

@stop

@section('js')
  <script>console.log('Hi');</script>
@stop
