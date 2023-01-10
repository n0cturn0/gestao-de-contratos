<?php

namespace App\Http\Livewire\Contrato;

use App\Models\Cliente;
use App\Models\Produto;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $data = array(
            'cliente' => Cliente::select()->get(),
            'produto' => Produto::select()->get(),
        );
        return view('livewire.contrato.index',['data' => $data]);
    }
}
