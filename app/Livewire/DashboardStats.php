<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashboardStats extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
