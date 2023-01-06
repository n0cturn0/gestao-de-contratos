<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Vendedor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $vendedor, $fone, $student_id;
    public $search = '';

    protected function rules()
    {
        return [
            'vendedor' => 'required|string|min:2',
            'fone' => 'required|string|min:6',
        ];
    }
    public function saveStudent()
    {
        $validatedData = $this->validate();
        Vendedor::create($validatedData);
        session()->flash('message','Vendedor Cadastrado com sucesso');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->vendedor = '';
    }
    public function closeModal()
    {
        $this->resetInput();
    }






    public function render()
    {
        $items = Vendedor::where('vendedor', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3);
        return view('livewire.vendedor.index',['students' => $items]);
    }
}
