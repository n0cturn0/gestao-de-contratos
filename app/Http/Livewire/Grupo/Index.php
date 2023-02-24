<?php

namespace App\Http\Livewire\Grupo;

use App\Models\Grupo;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $grupo,  $student_id;
    public $search = '';


    protected function rules()
    {
        return [
            'grupo'   => 'required|string|min:2',

        ];
    }

    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->cliente = '';
    }
    public function saveStudent()
    {
        $validatedData = $this->validate();
        Grupo::create($validatedData);
        session()->flash('message','Grupo cadastrado com sucesso!!');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function editStudent(int $student_id)
    {
        $student = Grupo::find($student_id);
        if ($student){
            $this->student_id = $student->id;
            $this->grupo = $student->grupo;
        }
    }

    public function  updateStudent(){
        $validatedData = $this->validate();
        Grupo::where('id', $this->student_id)->update([
            'grupo' => $validatedData['grupo']
        ]);
        session()->flash('message','Grupo atualizado com sucesso');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();


    }


    public function deleteStudent(int $student_id)
    {
        $this->student_id = $student_id;
    }

    public function destroyStudent()
    {
        Grupo::find($this->student_id)->delete();
        session()->flash('message','Grupo removido com sucesso');
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $items = Grupo::where('grupo', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(100);
        return view('livewire.grupo.index', ['students' => $items]);
    }
}
