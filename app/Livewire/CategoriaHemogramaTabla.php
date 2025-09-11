<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\CategoriaHemogramaCompleto;

use Livewire\Component;

class CategoriaHemogramaTabla extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); // Resetea la paginación cuando cambias el texto de búsqueda
    }

    public function render()
    {
        $categorias = CategoriaHemogramaCompleto::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.categoria-hemograma-tabla',[
            'categorias' => $categorias,
        ]);
    }
}
