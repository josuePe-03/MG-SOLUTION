<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Analisis;

class AnalisisTabla extends Component
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
        $analisis = Analisis::whereHas('cliente', function ($query) {
            $query->where('nombre', 'like', '%'.$this->search.'%');
        })
        ->paginate(10);

        return view('livewire.analisis-tabla', [
            'analisis' => $analisis,
        ]);
    }
}
