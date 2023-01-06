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

    public function editStudent(int $student_id)
    {
        $student = Vendedor::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
            $this->vendedor = $student->vendedor;
            $this->fone = $student->fone;

        } else {
            return redirect()->to('/vendedor');
            dd('erro');
        }
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();
        Vendedor::where('id', $this->student_id)->update([
            'vendedor'   => $validatedData['vendedor'],
            'fone'   => $validatedData['fone'],
        ]);
        session()->flash('message','Informações do vendedor atualizado com sucesso');

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteStudent(int $student_id)
    {
        $this->student_id = $student_id;
    }

    public function destroyStudent()
    {
        Vendedor::find($this->student_id)->delete();
        session()->flash('message','Vendedor removido com sucesso');
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
        $items = Vendedor::where('vendedor', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.vendedor.index',['students' => $items]);
    }
}
