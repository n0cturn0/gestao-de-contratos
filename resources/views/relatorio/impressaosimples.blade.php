@extends('adminlte::page')
<script src="https://momentjs.com/downloads/moment.js"></script>

@section('title', 'Criando um contrato')

@section('content_header')


@stop

@section('content')
    <h2>Relatório</h2>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap ">
            <thead>
            <th></th>
            <th>Vendedor</th>
            <th>Serviço</th>
            <th>Valor da Parcela</th>
            <th>Quantidade da parcela</th>
            <th></th>

            </thead>
            <tbody>
            <?php  $totalizado=0; ?>
            @foreach($data['inseridos'] as $key => $value)
                <tr>
                    <th></th>
                    <td>{{$value->vendedor}}</td>
                    <td>{{$value->servico}}</td>
                    <td>
                        @if($value->pagamento == 1)
                            @php
                                $pagamento = ($value->valorparcela);
                                $totalizado+=$pagamento;
                            @endphp

                            <div class="text-black-50">  <?php echo number_format($value->valorparcela,2,",","."); ?>-- PAGA</div>
                        @else
                            <div class="text-danger"> <?php echo number_format($value->valorparcela,2,",","."); ?> --PENDENTE</div>
                        @endif
                    </td>
                    <td>{{$value->mesvencimento}}</td>
                    <td>

                    </td>


                </tr>
            @endforeach
            <tr>
                <td  colspan="3">Valor Total Pago</td>
                <td colspan="2"><?php echo number_format($totalizado,2,",","."); ?></td>

            </tr>
            </tbody>
        </table>
    </div>
@stop
