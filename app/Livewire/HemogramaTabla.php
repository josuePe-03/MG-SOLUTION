<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HemogramaCompleto;

class HemogramaTabla extends Component
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
        $hemogramas = HemogramaCompleto::with(['categoria', 'unidad'])
            ->where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.hemograma-tabla', [
            'hemogramas' => $hemogramas,
        ]);
    }
}
