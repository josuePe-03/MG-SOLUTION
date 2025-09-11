<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Doctor;

class DoctorTabla extends Component
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
        $doctores = Doctor::where('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.doctor-tabla',[
            'doctores' => $doctores,
        ]);
    }
}
