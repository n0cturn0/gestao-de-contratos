
@extends('adminlte::page')
<script src="https://momentjs.com/downloads/moment.js"></script>
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

                        <div class="card" style="margin-top: 25px;">
                            <div class="card-header">
                                <h4>Relatório por vendedor</h4>
                            </div>
                        <div class="card-body">
                            <form method="POST" action="/relvendedor">
                                @csrf
                            <div class="form-group">
                                <div class="row">
                                        <div class="col-md-6">
                                            <label>Selecione o período </label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control" name="relatorio" value="01/01/2018 - 01/15/2018" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>


                                    <div class="col-md-6">
                                        <label>Selecione o vendedor</label>
                                            <select name="vendedor" class="custom-select form-control-border" id="exampleSelectBorder" required>
                                                <option value="">-----</option>
                                                @foreach($vendedor as  $value)
                                                <option value="{{$value->id}}">{{$value->vendedor}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group">
                                    <div class="icheckbox_flat-green checked" style="position: relative;" aria-checked="true" aria-disabled="false">
                                        <input  type="radio" name="pagamemto" value="0" class="flat-red" >Pendentes
                                        <input  type="radio" name="pagamemto" value="1" class="flat-red" >Pagas



                                    </div>
                                </div>



                            <div class="row">
                                <button type="submit" class="btn btn-block btn-primary btn-xs">Gerar Relatório</button>
                            </div>
                            </div>
                        </form>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('input[name="relatorio"]').daterangepicker({

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
                    "endDate": "01/12/2025"
                }, function(start, end, label) {
                    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
                });
            });

        </script>
        </script>

@stop
