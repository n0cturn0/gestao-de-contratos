<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoComponent extends Component
{
    use WithPagination;
    public $sortBy = 'produto';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';





    public function render()
    {
       $items = Produto::query()->orderBy($this->sortBy, $this->sortDirection)->paginate(3);
        return view('livewire.produto-component', compact('items'));
    }




    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }
}
