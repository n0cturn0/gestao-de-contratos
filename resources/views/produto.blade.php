@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">
        
       <?php $filtro = $colection->only(['title']);   ?>
       {{dd($filtro->all())}}
      
    </h1>
@stop

@section('content')

    @livewire('produto-component')
  
@stop




