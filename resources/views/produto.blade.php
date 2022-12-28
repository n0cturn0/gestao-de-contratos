@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">{{$message}}</h1>
    
@stop

@section('content')

    @livewire('produto-component')
  
@stop




