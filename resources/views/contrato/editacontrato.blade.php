
@extends('adminlte::page')
<script src="https://momentjs.com/downloads/moment.js"></script>
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

                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <th></th>
                                        <th>Vendedor</th>
                                        <th>Serviço</th>
                                        <th>Valor Parcela</th>
                                        <th>Comissão</th>
                                        <th>Vencimento</th>
                                        <th></th>
                                        </thead>
                                        @foreach($inserido as $value)
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <select name="vendedor" class="custom-select form-control-border" id="exampleSelectBorder">
                                                    <option>Selecione</option>
                                                    @foreach($vendedores as $v)
                                                    <option value="{{$v->id}}">{{$v->vendedor}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td> <input name="servico" value="{{$value->servico}}" disabled class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                            <td> <input name="valparcela" value="{{$value->valorparcela}}" class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                            <td> <input name="qtdparcela" value="{{$value->ivalorcomissao}}" class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                            <td> <input name="vencimento" value="{{$value->mesvencimento}}" disabled class="form-control form-control-sm" type="text" placeholder="Qtd Parcela" required ></td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <button type="button" class="btn btn-block btn-primary btn-xs">Atualizar Informações</button>
                                </div>






                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



@stop
