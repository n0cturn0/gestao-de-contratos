<?php

namespace App\Http\Livewire\Contrato;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Gerador extends Component
{






    public function render()
    {

        $items = DB::table('contratos')
            ->join('clientes','idCliente', '=', 'clientes.id')
            ->join ('produtos', 'idProduto', '=', 'produtos.id')
            ->join('contrato_situacaos','idcontrato','=', 'contratos.id' )
            ->where('contrato_situacaos.controle' ,  '=', 0)
            ->where('contrato_situacaos.situacao' ,  '=', 0)
            ->select('contratos.*', 'produtos.produto', 'clientes.cliente', 'contrato_situacaos.situacao','contrato_situacaos.idcontrato')
            ->get();


        return view('livewire.contrato.gerador',['data' => $items]);
    }


    public function store()
    {
        //https://www.itsolutionstuff.com/post/laravel-livewire-add-or-remove-dynamically-input-fields-exampleexample.html

    }





}
