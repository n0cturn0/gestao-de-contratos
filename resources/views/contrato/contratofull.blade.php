
@extends('adminlte::page')

@section('title', 'Criando um contrato')
@section('content_header')
@stop
@section('content')


    <div>
        <div class="container" >
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px">
                    <div class="card" style="margin-top: 25px;">

                        <div class="card-header">
                            <h4>
                                {{--                                <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Buscar cliente" style="width: 230px" />--}}
                                {{--                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">--}}
                                {{--                                    Adicionar novo Vendedor--}}
                                {{--                                </button>--}}
                            </h4>
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
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <th></th>
                                            <th>Pgm</th>
                                            <th>Boleto</th>
                                            <th>Vendedor</th>
                                            <th>Serviço</th>
                                            <th style="width:  1.0%">Vencimento</th>
                                            <th>Qtd parcela</th>
                                            <th style="width:  1.0%">Valor parcela</th>
                                            <th style="width:  1.0%">% Comissão</th>
                                            <th>Pgt Vendedor</th>
                                            </thead>
                                            <form method="POST" action="/processcontratofull">


                                                    @csrf
                                                @foreach($inserido as $key => $value)
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input name="checkpagm[][{{$value->id}}]" class="form-check-input" type="checkbox">
                                                                <label class="form-check-label">Pago</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input name="checkboleto[][{{$value->id}}]" class="form-check-input" type="checkbox">
                                                                <img src="{{asset('img/bb.png')}}" width="48" height="25">
                                                            </div>
                                                        </td>
                                                        <td>


                                                            <select name="vendedor[]" class="form-control select2" required >


                                                                @foreach($vendedores as $v)
                                                                    <option value="{{$v->id}}" selectd>{{$v->vendedor}}</option>

                                                                @endforeach

                                                            </select>
                                                        </td>
                                                        <td> <input name="servico[][{{$value->id}}]"      value="{{$value->servico}}" disabled class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                                        <td style="width:  1.0%"> <input name="diavencimento[][{{$value->id}}]"   value="{{$value->diavencimento}}" class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                                        <td style="width:  1.00%"> <input name="mesvencimento[][{{$value->id}}]" disabled   value="{{$value->mesvencimento}}" class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                                        <td style="width:  1.0%"> <input name="valorparcela[][{{$value->id}}]"       value="{{$value->valorparcela}}" disabled class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                                        <td style="width:  1.0%"><input name="indicecomissao[][{{$value->id}}]"  disabled     value="{{$value->indicecomissao}}"  class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                                        <td style="width:  1.0%"><input name="saldoreal[][{{$value->id}}]"       value="{{$value->saldoreal}}"  class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                                    </tr>
                                            @endforeach

                                        </table>
                                        <button type="submit" class="btn btn-block btn-primary btn-xs">Atualizar Informações</button>
                                    </div>
                                    </form>





                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
