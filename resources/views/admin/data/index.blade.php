@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
  <h1> Data</h1>
@stop

@section('content')
@livewire('admin-data')


@stop

@section('css')

@stop

@section('js')
<script src="//unpkg.com/alpinejs" defer></script>
@stop
