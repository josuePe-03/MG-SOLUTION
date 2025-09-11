<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permiso;

class PermisosTabla extends Component
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
        $permisos = Permiso::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.permisos-tabla',[
            'permisos' => $permisos,
        ]);
    }
}
