<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $cliente, $student_id, $cnpj, $estado, $cidade, $bairro, $rua, $numero;

    public $search = '';

    protected function rules()
    {
        return [
            'cliente'   => 'required|string|min:6',
            'cnpj'      =>  'required|integer|min:14|max:14',
            'estado'      =>  'required|string|min:2|max:2',
            'cidade'    => 'required|string|min:2',
            'rua'    => 'required|string|min:2',
            'numero'    =>  'required|integer|min:1',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();
        Cliente::create($validatedData);
    }


    public function render()
    {
        $items = Cliente::where('cliente', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3);

        return view('livewire.cliente.index',['students' => $items]);
    }
}
