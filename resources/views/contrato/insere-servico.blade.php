
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
                            @if(Session::has('success'))

                                <div class="alert alert-success">

                                    {{ Session::get('success') }}

                                    @php

                                        Session::forget('success');

                                    @endphp

                                </div>

                            @endif


                            <form method="POST" action="/insereativo">
                                @csrf
                                <div class="form-group">
                                    <div>
                                    @if($errors->has('vendedor'))
                                        <button class="btn btn-block btn-danger btn-xs" type="button">{{ $errors->first('vendedor') }}</button>
                                    @endif
                                    </div>

                                    <input name="id" value="{{$data['id']}}" type="hidden">
                                    <label for="exampleSelectBorder">Selecione o vendedor </label>
                                    <select name="vendedor" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">-----</option>
                                        @foreach($data['vendedores'] as $ket => $value)
                                            <option value="{{$value->id}}">{{$value->vendedor}}</option>
                                        @endforeach
                                    </select>


                                    <label for="exampleSelectBorder">Adicionar novo serviço ao contrato </label>
                                    @if($errors->has('servico'))
                                        <button class="btn btn-block btn-danger btn-xs" type="button">{{ $errors->first('servico') }}</button>
                                    @endif
                                    <select name="servico" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="">-----</option>
                                        @foreach($data['servicos'] as $ket => $value)
                                        <option value="{{$value->id}}">{{$value->servico}}&nbsp;&nbsp;&nbsp;Valor:{{$value->precounitario}}</option>
                                        @endforeach
                                    </select>


                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <input name="qtdparcela" class="form-control" type="text" placeholder="Qtd Parcela" required >
                                    </div>
                                </div>
                                <div style="margin-top: 5px">
                                    <button class="btn btn-block btn-primary" type="submit">inserir</button>
                                </div>
                            </form>

                            </form>
                        </div>



                        <div class="card-body">
                            <form action="/atualizastatuscontrato" method="POST">@csrf
                                <div class="form-group">
                                    @foreach($data['contrato'] as $ckey => $cvalue)
                                        <label for="exampleSelectBorder"><code>contrato:{{$cvalue->id}}</code><br>Cliente: {{$cvalue->cliente}} / Produto: {{$cvalue->produto}}  </label>
                                    @endforeach
                                    <div class="card-body table-responsive p-0">
                                   <table class="table table-hover text-nowrap ">
                                       <thead>
                                       <th>Vendedor</th>
                                       <th>Serviço</th>
                                       <th>Valor da Parcela</th>
                                       <th>Quantidade da parcela</th>
                                       <th>Valor total</th>
                                       <th></th>
                                       </thead>
                                       <tbody>
                                       <?php  $totalizado=0; ?>
                                       @foreach($data['inseridos'] as $key => $value)
                                        <tr>
                                            <td>{{$value->vendedor}}</td>
                                            <td>{{$value->servico}}</td>
                                            <td><?php echo number_format($value->valorunitario,2,",",".") ?></td>
                                            <td>{{$value->qtdparcela}}</td>
                                            <td>
                                                <?php
                                                  $total = ($value->qtdparcela*$value->valorunitario);

                                                  $totalizado+=$total;
                                                  echo number_format($total,2,",",".");

                                                    ?>
                                            </td>
                                            <td>
                                                <a href="{{url('apaga-servico/'.$value->id)}}"><i class="fas fa-trash text-danger  fa-lg"></i></a>
{{--                                                <button data-toggle="modal" id="smallButton" data-target="#modal-danger" data-attr="{{ route('apaga-servico', $value->id) }}" title="Delete Project">--}}
{{--                                                    <i class="fas fa-trash text-danger  fa-lg"></i>--}}
{{--                                                </button>--}}
                                            </td>

                                        </tr>
                                       @endforeach
                                        <tr>
                                            <td  colspan="3">Valor Total</td>
                                            <td colspan="2">{{$totalizado}}</td>

                                        </tr>
                                       </tbody>
                                   </table>
                                    </div>


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




