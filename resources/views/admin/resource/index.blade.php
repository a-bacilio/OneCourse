@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
  <h1> Administrar recursos</h1>
@stop

@section('content')
@livewire('admin-resource')


@stop

@section('css')

@stop

@section('js')
  <script>console.log('Hi');</script>
@stop
