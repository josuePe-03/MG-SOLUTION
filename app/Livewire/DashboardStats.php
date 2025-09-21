<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashboardStats extends Component
{
    public $totalProductos;

    public function mount()
    {
        // Contamos los productos desde la tabla "productos"
        $this->totalProductos = DB::table('productos')->count();
    }

    public function render()
    {
        return view('livewire.dashboard-stats', [
            'totalProductos' => $this->totalProductos,
        ]);
    }
}
