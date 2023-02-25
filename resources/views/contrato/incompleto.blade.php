@extends('adminlte::page')
<script src="https://momentjs.com/downloads/moment.js"></script>

@section('title', 'Criando um contrato')

@section('content_header')


@stop
@section('content')

    <div>

    <div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 10px">
            <div class="card" style="margin-top: 25px;">
                <div class="card-header">
                    @if(!empty($alert))
                        <a href="{{route('lista-contrato')}}" >  <div class="alert alert-danger"> {{ $alert }}</div></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop
