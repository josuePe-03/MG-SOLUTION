<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoAnalisis;

class TipoAnalisisTabla extends Component
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
        $tipos = TipoAnalisis::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.tipo-analisis-tabla',[
            'tipos' => $tipos,
        ]);
    }
}
