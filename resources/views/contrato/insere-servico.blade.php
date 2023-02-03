
@extends('adminlte::page')


@section('title', 'Criando um contrato')

@section('content_header')


@stop

@section('content')
{{--    @livewire('contrato.gerador')--}}


<div>
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
                            <form action="/atualizastatuscontrato" method="POST">@csrf
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Selecione o vendedor <code>.form-control-border</code></label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>-----</option>
                                        @foreach($data['vendedores'] as $ket => $value)
                                            <option value="{{$value->id}}">{{$value->vendedor}}</option>
                                        @endforeach
                                    </select>

                                    <label for="exampleSelectBorder">Adicionar novo serviço ao contrato <code>.form-control-border</code></label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>-----</option>
                                        @foreach($data['servicos'] as $ket => $value)
                                        <option value="{{$value->id}}">{{$value->servico}}&nbsp;&nbsp;&nbsp;Valor:{{$value->precounitario}}</option>
                                        @endforeach
                                    </select>


                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Qtd Parcela">
                                    </div>
                                </div>
                            </form>
                            <div style="margin-top: 5px">
                                <button class="btn btn-block btn-primary" type="button">Cadastrar</button>
                            </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <form action="/atualizastatuscontrato" method="POST">@csrf
                                <div class="form-group">
                                   <table class="table table-hover text-nowrap">
                                       <thead>
                                       <th>Servico</th>
                                       <th>Valor</th>
                                       </thead>
                                       <tbody>
                                        <tr>
                                            <td>ffff</td>
                                            <td>10000</td>
                                        </tr>
                                       </tbody>
                                   </table>



                                </div>
                            </form>
                            <div style="margin-top: 5px">

                            </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@stop




