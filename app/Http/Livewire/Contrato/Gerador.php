<?php

namespace App\Http\Livewire\Contrato;

use App\Models\Contrato;
use App\Models\ContratoSituacao;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Gerador extends Component
{
public $idcontrato, $clients, $contato;

    public function mount()
    {

        $this->clients = Produto::orderby('id')->get();

        if($this->idcontrato != ''){
            $this->contato = '3000';
        }

    }


    public function render()
    {
        return view('livewire.contrato.gerador');
    }



    public function store()
    {
        //https://www.itsolutionstuff.com/post/laravel-livewire-add-or-remove-dynamically-input-fields-exampleexample.html
        //https://www.youtube.com/watch?v=PMZyk7X3wUg&t=301s&ab_channel=TapanSharma
    }





}
