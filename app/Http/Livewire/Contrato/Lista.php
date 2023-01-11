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
    public $idcontrato,  $student_id, $identificador;
    public $posts;
    public $search = '';




    public function render()
    {
        $items = DB::table('contratos')
                    ->join('clientes','idCliente', '=', 'clientes.id')
                    ->join ('produtos', 'idProduto', '=', 'produtos.id')
                    ->join('contrato_situacaos','idcontrato','=', 'contratos.id' )
                    ->select('contratos.*', 'produtos.produto', 'clientes.cliente', 'contrato_situacaos.situacao')
                    ->paginate(10);
        return view('livewire.contrato.lista' , ['students' => $items]);
    }

    public function saveContrato()
    {

        dd($this->posts);
    }













}
