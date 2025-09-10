<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;

class ClienteTabla extends Component
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
        $clientes = Cliente::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.cliente-tabla', [
            'clientes' => $clientes,
        ]);

    }
}


