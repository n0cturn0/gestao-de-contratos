<?php

namespace App\Http\Livewire\Contrato;

use App\Models\Contrato;
use App\Models\ContratoSituacao;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Gerador extends Component
{
    //Entrada
    public $insituacao, $servico;
    public $contacts, $valorunitario, $valortotal, $contact_id, $situacao, $inputservico, $servicoid;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

//    public function mount()
//    {
//        $this->contacts = ContratoSituacao::all();
//
//    }







    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }


    public function render()
    {
        $binding = $this->situacao = DB::table('contratos')
            ->join('clientes','idCliente', '=', 'clientes.id')
            ->join ('produtos', 'idProduto', '=', 'produtos.id')
            ->join('contrato_situacaos','idcontrato','=', 'contratos.id' )
            ->where('contrato_situacaos.controle' ,  '=', 0)
            ->where('contrato_situacaos.situacao' ,  '=', 0)
            ->select('contratos.*', 'produtos.produto', 'clientes.cliente', 'contrato_situacaos.situacao')
            ->get();
        $in_servico = $this->servico = Servico::all();

        return view('livewire.contrato.gerador' , ['situacao' => $binding], ['servico' => $in_servico]);
    }

    private function resetInputFields(){
        $this->valorunitario = '';
        $this->valortotal = '';
        $this->servicoid = '';
        $this->$this->inputservico = '';
    }

    public function store()
    {
        //https://www.itsolutionstuff.com/post/laravel-livewire-add-or-remove-dynamically-input-fields-exampleexample.html
        //https://www.youtube.com/watch?v=PMZyk7X3wUg&t=301s&ab_channel=TapanSharma

        $validatedDate = $this->validate([
            'valorunitario.0'   => 'required',
            'valortotal.0'      => 'required',
            'valorunitario.*'   => 'required',
            'valortotal.*'      => 'required',
            'situacao.0'        => 'required',
            'inputservico.0'     => 'required',
            'inputservico'     => 'required',
        ],
            [
                'valorunitario.0.required' => 'name field is required',
                'valortotal.0.required' => 'phone field is required',
                'valorunitario.*.required' => 'name field is required',
                'valortotal.*.required' => 'phone field is required',
                'inputservico.0.required' => 'name field is required',
                'inputservico.required' => 'name field is required',
            ]
        );



        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Contact Has Been Created Successfully.');
    }


    public function identificacao()
    {

    dd($this->servicoid);

    }


}
