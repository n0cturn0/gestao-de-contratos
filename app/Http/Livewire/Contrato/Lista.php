<?php

namespace App\Http\Livewire\Contrato;

use App\Models\Contrato;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Lista extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $idcontrato,  $student_id, $identificador, $default=0;
    public $type='';
    public $search = '';




        public function render()
    {


        $items = DB::table('contratos')
                    ->join('clientes','idCliente', '=', 'clientes.id')
                    ->join ('produtos', 'idProduto', '=', 'produtos.id')
                    ->join('contrato_situacaos','idcontrato','=', 'contratos.id' )
                    ->where('contrato_situacaos.controle' ,  '=', 0)
                    ->where('contrato_situacaos.situacao' ,  '=', $this->type)
                    ->select('contratos.*', 'produtos.produto', 'clientes.cliente', 'contrato_situacaos.situacao')
                    ->get();
        return view('livewire.contrato.lista' , ['students' => $items]);
    }















}
