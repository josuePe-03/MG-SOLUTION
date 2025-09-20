<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoriaProducto;

class CategoriasProductosTabla extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); 
    }

    public function render()
    {
        $categorias = CategoriaProducto::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.categorias-productos-tabla',[
            'categorias' => $categorias,
        ]);
    }
}
