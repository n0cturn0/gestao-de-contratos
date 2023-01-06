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
            'cnpj'      =>  'required|integer|digits:14',
            'estado'      =>  'required|string|min:2|max:2',
            'bairro'      =>  'required|string|min:2',
            'cidade'    => 'required|string|min:2',
            'rua'    => 'required|string|min:2',
            'numero'    =>  'required|integer|min:1',
        ];
    }
    public function resetInput()
    {
        $this->cliente = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();
        Cliente::create($validatedData);
        session()->flash('message','Cliente cadastrado com sucesso!!');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $items = Cliente::where('cliente', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3);

        return view('livewire.cliente.index',['students' => $items]);
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function editStudent(int $student_id)
    {
        $student = Cliente::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
            $this->cliente = $student->cliente;
            $this->cnpj = $student->cnpj;
            $this->cidade   = $student->cidade;
            $this->bairro   = $student->bairro;
            $this->rua      = $student->rua;
            $this->numero   = $student->numero;
        } else {
            return redirect()->to('/cliente');
            dd('erro');
        }
    }
    public function updateStudent()
    {
        $validatedData = $this->validate();
        Cliente::where('id', $this->student_id)->update([
            'cliente'   => $validatedData['cliente'],
            'cnpj'      => $validatedData['cnpj'],
            'cidade'    => $validatedData['cidade'],
            'bairro'    => $validatedData['bairro'],
            'rua'       => $validatedData['rua'],
            'numero'    => $validatedData['numero']
    ]);
        session()->flash('message','Cliente atualizado com sucesso');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    public function deleteStudent(int $student_id)
    {
        $this->student_id = $student_id;
    }

    public function destroyStudent()
    {
        Cliente::find($this->student_id)->delete();
        session()->flash('message','Cliente removido com sucesso');
        $this->dispatchBrowserEvent('close-modal');
    }









}
