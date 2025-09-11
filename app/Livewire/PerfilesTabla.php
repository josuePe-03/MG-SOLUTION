<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Perfil;

class PerfilesTabla extends Component
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
        $perfiles = Perfil::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.perfiles-tabla',[
            'perfiles' => $perfiles,
        ]);
    }
}
