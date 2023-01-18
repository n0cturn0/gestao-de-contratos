<?php

namespace App\Http\Livewire\Servico;
use App\Models\Servico;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $servico, $student_id, $tipo, $precounitario;

    public $search = '';
    protected function rules()
    {
        return [
            'servico' => 'required|string|min:6',
            'precounitario' => 'required|string|min:1',
        ];
    }
    public function render()
    {
        $items = Servico::where('servico', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.servico.index',['students' => $items]);
    }
    public function resetInput()
    {
        $this->produto = '';
    }
    public function closeModal()
    {
        $this->resetInput();
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();

        Servico::create($validatedData);
        session()->flash('message','Servico Cadastrado com sucesso');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function editStudent(int $student_id)
    {
        $student = Servico::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
            $this->servico = $student->servico;
            $this->precounitario = $student->precounitario;
        } else {
            return redirect()->to('/servico');
            dd('erro');
        }
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();
        Servico::where('id', $this->student_id)->update([
            'servico'   => $validatedData['servico'],
            'precounitario' => $validatedData['precounitario']
        ]);
        session()->flash('message','Serviço atualizado com sucesso');

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteStudent(int $student_id)
    {
        $this->student_id = $student_id;
    }
    public function destroyStudent()
    {
        Servico::find($this->student_id)->delete();
        session()->flash('message','Serviço removido');
        $this->dispatchBrowserEvent('close-modal');
    }
}
