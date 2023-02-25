
@extends('adminlte::page')
<script src="https://momentjs.com/downloads/moment.js"></script>

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

                                @if(Session::has('alert'))

                                    <div class="alert alert-danger">

                                        {{ Session::get('alert') }}

                                        @php

                                            Session::forget('alert');

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
                                    <div class="row">



                                    <div class="row">
                                    <div class="col-9">
                                            <label for="exampleSelectBorder">Adicionar novo serviço ao contrato </label>
                                            @if($errors->has('servico'))
                                                <button class="btn btn-block btn-danger btn-xs" type="button">{{ $errors->first('servico') }}</button>
                                            @endif
                                            <select name="servico" class="custom-select form-control-border" id="exampleSelectBorder">
                                                <option value="">-----</option>
                                                @foreach($data['servicos'] as $ket => $value)
                                                    <option value="{{$value->id}}">{{$value->servico}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <label>Valor para esse serviço:</label>
                                        <input name="valservico" class="form-control" type="text" placeholder="Valor para esse serviço" required >
                                    </div>


                                    <div class="col-3">
                                        <label>Quantidade de parcelas:</label>
                                        <input name="qtdparcela" class="form-control" type="text" placeholder="Qtd Parcela" required >
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Data da primeira cobrança:</label>
                                            <div>
                                                @if($errors->has('daterangeprimeira'))
                                                    <button class="btn btn-block btn-danger btn-xs" type="button">{{ $errors->first('daterangeprimeira') }}</button>
                                                @endif
                                            </div>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control" name="daterangeprimeira" value="01/01/2018 - 01/15/2018" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <h2>Iinformação da venda</h2>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleSelectBorder">Selecione o vendedor </label>
                                            <select name="vendedor" class="custom-select form-control-border" id="exampleSelectBorder">
                                                <option value="">-----</option>
                                                @foreach($data['vendedores'] as $ket => $value)
                                                    <option value="{{$value->id}}">{{$value->vendedor}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-3">
                                            <label>Parcelas para Vendedor:</label>
                                            <input name="parcelavendedor" class="form-control" type="text" placeholder="Qtd Parcela" required >
                                        </div>

                                        @if(!empty($menor))
                                            <div class="alert alert-success"> {{ $menor }}</div>
                                        @endif



                                    </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-3">--}}
{{--                                        <label>Valor do reajuste:(%)</label>--}}
{{--                                        @if($errors->has('valorreajuste'))--}}
{{--                                            <button class="btn btn-block btn-danger btn-xs" type="button">{{ $errors->first('valorreajuste') }}</button>--}}
{{--                                        @endif--}}
{{--                                        <input type="numer" name="valorreajuste"  class="form-control" placeholder="Valor do Reajuste" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Data de para o reajuste:</label>--}}
{{--                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">--}}
{{--                                                <input type="text" class="form-control" name="daterangereajuste" value="01/01/2018 - 01/15/2018" />--}}
{{--                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">--}}
{{--                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}





                                <div style="margin-top: 5px">
                                    <button class="btn btn-block btn-primary" type="submit">Gerar Mensalidade para este contrato</button>
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
                                       <th></th>
                                       <th>Vendedor</th>
                                       <th>Serviço</th>
                                       <th>Valor da Parcela</th>
                                       <th>Quantidade da parcela</th>
                                       <th>Config</th>
                                       <th></th>
                                       </thead>
                                       <tbody>
                                       <?php  $totalizado=0; ?>
                                       @foreach($data['inseridos'] as $key => $value)
                                        <tr>
                                            <th>{{$value->id}}</th>
                                            <td>{{$value->vendedor}}</td>
                                            <td>{{$value->servico}}</td>
                                            <td><?php echo number_format($value->valorparcela,2,",",".") ?></td>
                                            <td><?php echo $value->mesvencimento; ?></td>
                                            <td>
                                                <?php
//                                                    echo number_format($value->pagamento,2,",",".");
//                                                    $acumula = 0;
//
//
                                                  $total = (floatval($value->pagamento));

                                                  $totalizado+=$total;

//                                                  echo number_format($teste,2,",",".");
//                                                echo $total;

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
                                            <td colspan="2"><?php echo number_format($totalizado,2,",","."); ?></td>

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
<script>
    //     $(function() {
    //     $('input[name="daterange"]').daterangepicker({
    //         opens: 'left'
    //     }, function(start, end, label) {
    //         console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    //     });
    // });

    $(function() {
        $('input[name="daterangeprimeira"]').daterangepicker({
            "singleDatePicker": true,
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Do",
                    "Seg",
                    "Ter",
                    "Qua",
                    "Qui",
                    "Sex",
                    "Sab"
                ],
                "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                ],
                "firstDay": 1
            },
            "startDate": moment(new Date()).format('DD/MM/YYYY'),
            "endDate": "01/13/2023"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    });


    $(function() {
        $('input[name="daterangereajuste"]').daterangepicker({
            "singleDatePicker": true,
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Do",
                    "Seg",
                    "Ter",
                    "Qua",
                    "Qui",
                    "Sex",
                    "Sab"
                ],
                "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                ],
                "firstDay": 1
            },
            "startDate": moment(new Date()).format('DD/MM/YYYY'),
            "endDate": "01/13/2023"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    });

</script>
@stop




