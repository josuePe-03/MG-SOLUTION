<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsuariosTabla extends Component
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
        $usuarios = User::where('name', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.usuarios-tabla',[
            'usuarios' => $usuarios,
        ]);
    }
}
