<?php
//https://www.fundaofwebit.com/post/laravel-9-livewire-crud-using-bootstrap-modal
namespace App\Http\Livewire\Produto;

use Livewire\WithPagination;
use App\Models\Produto;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $produto, $student_id;

    public $search = '';

    protected function rules()
    {
        return [
            'produto' => 'required|string|min:6',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function saveStudent()
    {
        $validatedData = $this->validate();

        Produto::create($validatedData);
        session()->flash('message','Produto Cadastrado com sucesso');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $items = Produto::where('produto', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3);
        return view('livewire.produto.index', ['students' => $items]);
    }





    public function editStudent(int $student_id)
    {
        $student = Produto::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
            $this->produto = $student->produto;
        } else {
            return redirect()->to('/students');
            dd('erro');
        }
    }
    public function resetInput()
    {
        $this->produto = '';
    }
    public function closeModal()
    {
        $this->resetInput();
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();
        Produto::where('id', $this->student_id)->update([
            'produto'   => $validatedData['produto'],
        ]);
        session()->flash('message','Produto atualizado com sucesso');

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteStudent(int $student_id)
    {
        $this->student_id = $student_id;
    }

    public function destroyStudent()
    {
        Produto::find($this->student_id)->delete();
        session()->flash('message','Produto removido com sucesso');
        $this->dispatchBrowserEvent('close-modal');
    }







}

