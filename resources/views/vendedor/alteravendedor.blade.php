
@extends('adminlte::page')

@section('title', 'Alterando vendedor')
@section('content_header')
@stop
@section('content')


    <div>
        <div class="container" >
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px">
                    <div class="card" style="margin-top: 25px;">

                        <div class="card-header">

                        </div>
                        @if(Session::has('success'))

                            <div class="alert alert-success">

                                {{ Session::get('success') }}

                                @php

                                    Session::forget('success');

                                @endphp

                            </div>

                        @endif

                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <label>Atualizar Vendedor</label>
                                    <form method="POST" action="/updatevendedor">
                                        @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <select name="vendedor"  class="form-control-sm select2-blue" required>
                                    <option value="" selected>Selecione um vendedor</option>
                                    @foreach($vendedor as $value)
                                    <option value="{{$value->id}}"  selectd>{{$value->vendedor}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                            <div class="row">
                                <button type="submit" class="btn btn-block btn-primary btn-xs">Atualizar para vendedor selecionado</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
