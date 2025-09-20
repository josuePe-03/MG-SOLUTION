<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MarcaProducto;

class MarcasProductosTabla extends Component
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
        $marcas = MarcaProducto::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.marcas-productos-tabla',[
            'marcas' => $marcas,
        ]);
    }
}
