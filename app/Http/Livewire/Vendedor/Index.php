<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Vendedor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public function render()
    {
        $items = Vendedor::where('vendedor', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(3);
        return view('livewire.vendedor.index',['students' => $items]);
    }
}
