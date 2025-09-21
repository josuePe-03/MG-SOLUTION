<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class ProductosTabla extends Component
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
        $productos = Producto::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.productos-tabla',[
            'productos' => $productos,
        ]);
    }
}
