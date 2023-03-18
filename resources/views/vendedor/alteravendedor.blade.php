
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
                                <input type="hidden" name="id" value="{{$id}}">
                                <select name="vendedor"  class="form-control-sm select2-blue" required>
                                    @foreach($vendedor as $value)
                                    <option value="{{$value->id}}"  selectd>{{$value->vendedor}}</option>
                                    @endforeach
                                </select>


                                    </form>

                            </div>

                        </div>

                            <div class="row">
                                <button type="submit" class="btn btn-block btn-primary btn-xs">Atualizar para vendedor selecionado</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
