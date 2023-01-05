<?php

namespace App\Http\Livewire\Produto;

use App\Models\Produto;
use http\Env\Request;
use Livewire\Component;

class Create extends Component
{
    public $produto;

    protected $rules = [
        'produto' => 'required|string|max:255|min:3'

    ];
    public function render()
    {
        $message = 'Cadastrando novo produto';
        return view('livewire.produto.create',['message' => $message]);
    }


    public function save()
    {
        $this->validate();
        $save = Produto::insert([
        'produto' => $this->produto
        ]);

        session()->flash('success_message', 'Novo produto inserido com sucessso!');
        $this->reset();
        //return redirect()->route('produto.cadastro');
    }
}
