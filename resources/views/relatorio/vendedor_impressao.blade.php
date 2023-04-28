
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/demo.min.js" integrity="sha512-1WYc267IxoxmWXSOf4gXEEiyfgK041c8LYQQBnIl4EsvcR5T+x+nJ2f783U29u2QX7OzDTYI0nEyTZ05O8Y1jg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/alt/adminlte.components.min.css" integrity="sha512-C6GDY2X+A6W2CYRoEykmm+Ta04hV2TqOSer0LJ+TeZCY3+b9i9pDnbwNgvlrpZSZIgBonixchcyVe7Nu8ccauQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/alt/adminlte.core.min.css" integrity="sha512-xihZdz1B0BgSS+aKKZn3WCVokTH1I/KbsubJJ/jfk9ir22aAtbFHw+oGPvKJUX76Wtl3kKhO+Wkj6Z47Pa76VQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/alt/adminlte.extra-components.min.css" integrity="sha512-Rho/nal+5pKgEFMfnMeJ5iynqFe2y/ev+KwrKIzFALivzIkj+3ymOWzhY/T9m5v9pkDUxZevORjoavsYCVbU/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/alt/adminlte.light.min.css" integrity="sha512-sH43x9hDH6VYZCimbGd58vYrO4uMdmPn3m8QUgxNYi4MNmj4sbt+fN1jG+TnVA2Q0SA6tvEo6W6P1Z0FA+6AXA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/alt/adminlte.plugins.min.css" integrity="sha512-ayIIFF0UuqVTtj88SVYRvEcSf+vs9aLDgte4Fd+jdsFFr3zJYo5wEjFFD0QXCM+3WrVUCyUAW8meKc2kzO5Tow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/alt/adminlte.pages.min.css" integrity="sha512-G5uca2T4CI7/9IHrOI1DKXQaqBN17tyNzgL4rMSEavhnKwN82WDWptayW8/VbzI21UCjpErfXv7jRve+iCbb9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/pages/dashboard.min.js" integrity="sha512-wXkHJ2i8Z5fK/q6k7qe38qA6uD+VpLC/LL2XobX3rVVw6F3//fDWwoqMQ2Mgy5nf9BIvW2gLbILQJTIO/gDrDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/pages/dashboard2.min.js" integrity="sha512-/On5eFU1vz1sGgejVpebEmg91zdKYXBcm4HPzDHcKOF1icilwxSR0C1ClBcK9IodnQdow2HjmHnqxt8PdQRrAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/pages/dashboard3.min.js" integrity="sha512-l8RWdqTMUrIWPpdL2yB14+n+2WBPFe/KhH65aa3YAi+fRVvRMKxMVgmdk0/EUXLRKLFJmUH4rBABfxBsribrJg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<div class="card-body table-responsive p-0">
    <h3>{{$status}}</h3><hr>

    <table class="table table-bordered text-nowrap text-xs ">
        <thead>

        <th>Vendedor</th>
        <th>Serviços</th>
        <th>Valor</th>
        <th>Referência</th>
        <th></th>
        </thead>
        <tbody>
        <?php  $totalizado=0; ?>
        @foreach($relvendedor as $key => $value)
            <tr>
                <td>{{$value->vendedor}}</td>
                <td>{{$value->servico}}</td>
                <td>
                    @if($value->pagamento == 1)
                        @php
                            $pagamento = ($value->valorparcela);
                            $totalizado+=$pagamento;
                        @endphp

                        <div class="text-black-50">  <?php echo number_format($value->valorparcela,2,",","."); ?><i class="fa fa-check-square text-success" aria-hidden="true"></i></div>
                    @else
                        <div class="text-danger"> <?php echo number_format($value->valorparcela,2,",","."); ?></div>
                    @endif
                </td>
                <td>{{$value->mesvencimento}}</td>
                <td>
                    @if($value->pagamento == 1)
                        Paga
                    @else
                        <div class="text-danger">Pendente</div>
                    @endif

                </td>

            </tr>
        @endforeach
        <tr>
            <td  colspan="2">Valor Total Pago</td>
            <td colspan="3"><?php echo number_format($totalizado,2,",","."); ?></td>

        </tr>
        </tbody>
    </table>
    <div class="text text-xs">
        Relatório gerado:{{$dataAtualFormatada}}
    </div>
</div>


</div>




